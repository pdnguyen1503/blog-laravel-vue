<template>
    <div>
        <section class="content">
			<div class="row justify-content-around">
				<div class="col-10">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Post List</h3>
							<div class="card-tools">
								<button class="btn btn-primary">
									<router-link to="/add-post" style="color:#fff">Add Post</router-link>
								</button>
							</div>
						</div>
						<div class="card-body">
							<table id="example2" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>Index</th>
										<th>User</th>
										<th>Category</th>
										<th>Title</th>
										<th>Description</th>
										<th>Photo</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<tr v-for="(post, index) in allPost" :key="`${index}`">
										<td>{{ index + 1 }}</td>
										<td v-if="post.user">{{ post.user.name }}</td>
										<td v-if="post.category">{{ post.category.cat_name }}</td>
										<td>{{ post.title | sortlength(15, "...") }}</td>
										<td>{{ post.description | sortlength(20, "...") }}</td>
										<td><img :src="ourImage(post.photo)" alt="" style="width:40px; height: 40px"></td>
										<td>
											<a href="" ></a>
											<router-link :to="`/edit-post/${post.id}`">Edit</router-link>
											<a href="" @click.prevent="deletePost(post.id)">Delete</a>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</section>
    </div>
</template>
<script>
import Axios from "axios"
	export default{
		name: "List",
		mounted(){
			this.$store.dispatch("getAllPost")
		},
		computed: {
			allPost(){
				return this.$store.getters.getAllPost
			}
		},
		methods: {
			ourImage(img){
				return "storage/images/" + img;
			},

			deletePost(id){
				Axios.get('/delete-post/'+id)
				.then((response)=>{
					this.$store.dispatch("getAllPost")
					Toast.fire({
						icon: 'success',
						title: 'delete post successfully'
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