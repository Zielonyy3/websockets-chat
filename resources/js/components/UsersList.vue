<template>
    <div>
        <chat-to-user
            v-for="user in users"
            v-bind:user="user"
            v-bind:key="user.id"
        ></chat-to-user>
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            users: [],
        }
    },
    mounted() {
        this.getAllUsers();
    },
    methods: {
        getAllUsers() {
            axios.get('api/get-all-users')
                .then((response) => {
                    this.users = response.data;
                    console.log('Uzytkownicy', this.users);
                })
                .catch((error) => {
                    console.warn(error.response.data)
                });
        }
    },
}
</script>
