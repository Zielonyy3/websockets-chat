<template>
    <div class="col-5 px-0">
        <div class="bg-white">
            <div class="bg-gray px-4 py-2 bg-light">
                <p class="h5 mb-0 py-1">{{ title }}</p>
            </div>

            <div class="messages-box">
                <chat-to-user
                    v-on:change-user="changeUser"
                    v-for="user in users"
                    v-bind:user="user"
                    v-bind:key="user.id"
                ></chat-to-user>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: function () {
        return {
        }
    },
    props: ['title', 'users'],
    methods:{
        changeUser(changedUser){
            this.$emit('change-user', changedUser);
        }
    },
}
</script>
