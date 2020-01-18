<template>
    <div>
        <section class="content">
			<div class="row justify-content-around">
				<div class="col-10">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Category List</h3>
							<div class="card-tools">
								<button class="btn btn-primary">
									<router-link to="/add-category" style="color:#fff">Add Category</router-link>
								</button>
							</div>
						</div>
						<div class="card-body">
							<table id="example2" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>Index</th>
										<th>Category Name</th>
										<th>Date</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									<tr v-for="(category, index) in getAllCategory" :key="`${index}-${category.id}`">
										<td>{{index + 1 }}</td>
										<td>{{category.cat_name}}</td>
										<td>{{category.created_at | timeformat }}</td>
										<td>
										<router-link :to="`/edit-category/${category.id}`">Edit</router-link>
										<a href="" @click.prevent="deleteCategory(category.id)">Delete</a>
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
			this.$store.dispatch("allCategory")
		},
		computed: {
			getAllCategory(){
				return this.$store.getters.getCategory;
			}
		},
		methods: {
			deleteCategory(id){
				Axios.get('/category/'+id)
				.then(()=>{
					this.$store.dispatch("allCategory")
					Toast.fire({
						icon: 'success',
						title: 'Delete category successfully'
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