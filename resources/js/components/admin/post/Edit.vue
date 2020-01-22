<template>
    <div>
		<section class="content">
			<div class="container-fluid">
				<div class="row justify-content-around">
					<div class="col-md-10">
						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title">Update Post</h3>
							</div>
							<form role="form" enctype="multipart/form-data" @submit.prevent="updatePost()">
								<div class="card-body">
									<!-- title -->
									<div class="form-group">
										<label for="exampleInputTitle">Post Title</label>
										<input type="text" class="form-control"
											id="exampleInputTitle" 
											placeholder="Enter Title"
											v-model="form.title"
											name="title"
											:class="{ 'is-invalid': form.errors.has('title') }"
											>
										
										<has-error :form="form" field="title"></has-error>
									</div>
									<!-- category id relationship -->
									<div class="form-group">
										<label for="exampleInputCategory">Post Category </label>
										<select class="form-control" 
											:class="{ 'is-invalid' : form.errors.has('cat_id') }"
											v-model="form.cat_id"
											>
											<option disabled>Select One</option>
											<option :value="category.id" v-for="(category, index) in getAllCategory" :key="`${index}`">
												{{ category.cat_name }}
											</option>
										</select>
										<has-error :form="form" field="cat_id"></has-error>
									</div>
									<!-- description -->
									<div class="form-group">
										<label for="exampleInputDescription">Description</label>
											<markdown-editor 
												v-model="form.description" 
												:class="{ 'is-invalid': form.errors.has('description') }"
											></markdown-editor>
										
										<has-error :form="form" field="description"></has-error>
									</div>
									<!-- photo -->
									<div class="form-group">
										<label for="exampleInputPhoto">Post Photo</label>
										<input 
											v-on:change="changePhoto($event)"
											type="file"
											name="photo"
											:class="{ 'is-invalid': form.errors.has('photo') }"
											>
											<img :src="updateImage()" alt="" style="width:80px; height:80px">
										<has-error :form="form" field="photo"></has-error>
									</div>
								</div>
								<div class="card-footer">
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
    </div>
</template>
<script>
import Axios from 'axios'

    export default{
		name: "New",
		data(){
			return{
				form: new Form({
					title: '',
					user_id: '',
					cat_id: '',
					description: '',
					photo: '',

				})
			}
		},
		mounted(){
			this.$store.dispatch("allCategory")
		},
		created(){
			Axios.get(`post/${this.$route.params.postId}`)
			.then((response) =>{
				this.form.fill(response.data.post);
			})
		},
		computed:{
			getAllCategory(){
				return this.$store.getters.getCategory;
			}
		},
		methods: {
			changePhoto(event){
				let file = event.target.files[0];
				if(file.size > 1048576){
					Swal.fire({
					icon: 'error',
					title: 'Error size of photo',
					text: 'Size of photo  limited!',
					footer: '<a href>Why do I have this issue?</a>'
					});
				}else{
					let reader = new FileReader();
					reader.onload = (event) => {
						this.form.photo = event.target.result;
					};
					reader.readAsDataURL(file);
				}
				
			},

			updatePost: function(){
				this.form.post(`/update-post/${this.$route.params.postId} `)
				.then((response)=>{
					this.$router.push('/posts')
					Toast.fire({
						icon: 'success',
						title: 'Update post successfully'
					})
				})
				.catch(()=>{

				})
			},

			updateImage: function(){
				let img = this.form.photo;
				if(img.length >100){
					return this.form.photo;
				}else{
					return `storage/images/${this.form.photo}`;
				}
			}
		}
    }

</script>

<style lang="stylus" scoped>

</style>