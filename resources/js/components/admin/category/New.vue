<template>
    <div>
		<section class="content">
			<div class="container-fluid">
				<div class="row justify-content-around">
					<div class="col-md-6">
						<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Add Category</h3>
						</div>
						<form role="form" @submit.prevent="addCategory()">
							<div class="card-body">
							<div class="form-group">
								<label for="exampleInputCategoryName">Category Name</label>
								<input type="text" class="form-control" 
									id="exampleInputCategoryName" 
									placeholder="Enter category name"
									v-model="form.cat_name"
									name="cat_name"
									:class="{ 'is-invalid': form.errors.has('cat_name') }">
								
								<has-error :form="form" field="cat_name"></has-error>
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

    export default{
		name: "New",
		data(){
			return {
				form: new Form({
					cat_name: '',
				})
			}
		},
		methods: {
			addCategory: function(){
				this.form.post('/add-category')
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