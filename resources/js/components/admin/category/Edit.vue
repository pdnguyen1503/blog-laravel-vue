<template>
    <div>
		<section class="content">
			<div class="container-fluid">
				<div class="row justify-content-around">
					<div class="col-md-6">
						<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Edit Category</h3>
						</div>
						<form role="form" @submit.prevent="editCategory()">
							<div class="card-body">
							<div class="form-group">
								<label for="exampleInputEmail1">Category Name</label>
								<input type="text" class="form-control" 
									id="exampleInputEmail1" 
									placeholder="Enter category name"
									v-model="form.cat_name"
									name="cat_name"
									:class="{ 'is-invalid': form.errors.has('cat_name') }">
								
								<has-error :form="form" field="cat_name"></has-error>
							</div>
							</div>
							<div class="card-footer">
							<button type="submit" class="btn btn-primary">Edit</button>
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
        name: "Edit",
        mounted(){
            Axios.get(`/edit-category/${this.$route.params.categoryid}`)
            .then((response) => {
                this.form.fill(response.data.category)
            })
        },
		data(){
			return {
				form: new Form({
					cat_name: '',
				})
			}
		},
		methods: {
			editCategory: function(){
				this.form.post(`/edit-category/${this.$route.params.categoryid}`)
				.then((response)=>{
					this.$router.push('/categories')
					Toast.fire({
					icon: 'success',
					title: 'Add category successfully'
					})
				})
				.catch(()=>{

				})
			}
		}
    }

</script>

<style lang="stylus" scoped>

</style>