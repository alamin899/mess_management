export default {
    state:{
        users:[]
    },
    getters:{
        getUsers(state)
        {
            return state.users
        }
    },
    actions:{
        users(context){
            axios.get('/api/user')
                .then((response)=>{
                    context.commit('users',response.data)
                })
        },
    },
    mutations:{
        users(state,data){
            return state.users = data
        },
    }

}