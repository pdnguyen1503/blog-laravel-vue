<template>
    <div>
		<section class="content">
			<div class="container-fluid">
				<div class="row justify-content-around">
					<div class="col-md-6">
						<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Edit Post</h3>
						</div>
						<form role="form" @submit.prevent="">
							<div class="card-body">
							<div class="form-group">
								<label for="exampleInputEmail1">Post Name</label>
								<input type="text" class="form-control" >
								
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
            
        },
		data(){
			
		},
		methods: {
			
		}
    }

</script>

<style lang="stylus" scoped>

</style>