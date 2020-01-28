<template>
    <div>
        <section id="inner-headline">
            <div class="container">
                <div class="row">
                <div class="span4">
                    <div class="inner-heading">
                    <h2>Blog left sidebar</h2>
                    </div>
                </div>
                <div class="span8">
                    <ul class="breadcrumb">
                    <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
                    <li><a href="#">Blog</a><i class="icon-angle-right"></i></li>
                    <li class="active">Blog with left sidebar</li>
                    </ul>
                </div>
                </div>
            </div>
        </section>
        <section id="content">
            <div class="container">
                <div class="row">
                    <div class="span8">
                        <article v-for="(blogpost, index) in blogPost" :key="`${index}`">
                            <div class="row">
                                <div class="span8">
                                <div class="post-image">
                                    <div class="post-heading">
                                    <h3><a href="#">{{blogpost.title}}</a></h3>
                                    </div>
                                    <img :src="`storage/images/${blogpost.photo}`" alt="" style="width:400px; height:200px" />
                                </div>
                                <p>
                                    {{ blogpost.description | sortlength(100, "...") }}   
                                </p>
                                <div class="bottom-article">
                                    <ul class="meta-post">
                                    <li><i class="icon-calendar"></i><a href="#"> Mar 23, 2013</a></li>
                                    <li v-if="blogpost.user"><i class="icon-user"></i><a href="#">{{ blogpost.user.name}}</a></li>
                                    <li v-if="blogpost.category" ><i class="icon-folder-open"></i><a href="#">{{ blogpost.category.cat_name }}</a></li>
                                    <li><i class="icon-comments"></i><a href="#">4 Comments</a></li>
                                    </ul>
                                    <a href="#" class="pull-right">Continue reading <i class="icon-angle-right"></i></a>
                                </div>
                                </div>
                            </div>
                        </article>
                       
                        <div id="pagination">
                            <span class="all">Page 1 of 3</span>
                            <span class="current">1</span>
                            <a href="#" class="inactive">2</a>
                            <a href="#" class="inactive">3</a>
                        </div>
                    </div>
                    <BlogSiderBar></BlogSiderBar>
                </div>
            </div>
        </section>
    </div>
</template>
<script>
import BlogSiderBar from './BlogSideBar.vue'
    export default{
        name: "BlogPost",
        data(){
            return {
                id:""
            }
        },
        components: {
            BlogSiderBar,
        },
        mounted: function(){
            this.$store.dispatch('getBlogPost')
        },
        computed: {
            blogPost(){
                return this.$store.getters.getBlogPost;
            }
        },
        methods: {

        },
    }
</script>

<style lang="less" scoped>

</style>