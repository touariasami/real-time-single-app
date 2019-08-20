<template>
    <div>
        <button class="btn " @click="likeIt">
            <i :class="icon" :style="{color: color}"></i> {{ count_likes }}
        </button>
    </div>
</template>

<script>
export default {
    props: ['content'],
    data(){
        return {
            count_likes : this.content.likes_count,
            liked: this.content.liked,
            //icon: 'far fa-heart',
            
            user: User.id()
        }
    },
    computed:{
        color(){
            return this.liked ? 'red' : 'black'
        },

        icon(){
            return this.liked ? 'fas fa-heart' : 'far fa-heart'
        }
    },
    methods:{
        likeIt(){ 
            
            if(User.loggedIn()){
                
                this.liked = !this.liked
                if(this.liked){
                    axios.post('/api/like/'+this.content.id ,{ user_id : this.user , reply_id: this.content.id})
                    .then(res => {
                        this.count_likes++
                        //this.icon = 'fas fa-heart'
                    })
                } else {
                    axios.delete('/api/like/'+this.content.id)
                    .then(res => {
                        this.count_likes-- 
                        //this.icon = 'far fa-heart'
                    })
                }    
            }
            

        }
    }
}
</script>

<style scoped>

</style>