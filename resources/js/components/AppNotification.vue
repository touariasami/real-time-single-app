<template>
    <div class="dropdown">
        <button class="btn" type="button" id="dropdownMenuButton" :style="{color : color}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell"></i> {{ unread_count }}
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            
            <!-- 
                <a v-for="item in unread" :key="item.id" class="dropdown-item" href="#">{{ item.data.question }}</a>
            -->
            <div v-if="unread_count > 0">
                <router-link  v-for="item in unread" :to="item.path"    :key="item.id" >
                <a @click="readIt(item)" class="dropdown-item">{{ item.replyBy }} a ajouter un commentaire</a>
                </router-link>
            </div>
            <div v-else>
            <router-link to="" class="dropdown-item">Aucune notification
            </router-link>
            </div>
            
            
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            read:{},
            unread: {},
            unread_count: 0,
        }
    },

    computed:{
        color(){
            return this.unread_count > 0 ? '#000' : '#fff'
        }
    },

    created(){
        if(User.loggedIn()){
            axios.post('/api/notifications')
            .then(res => {
                this.read = res.data.read
                this.unread = res.data.unread
                this.unread_count = res.data.unread.length
            })
        }
    },

    methods:{
        readIt(notification){
            axios.post('/api/notification/markAsRead',{id: notification.id})
            .then(res => {
                this.unread.splice(notification, 1)
                this.read.push(notification)
                this.unread_count--
            })
        }
    }
}
</script>

<style scoped>

</style>