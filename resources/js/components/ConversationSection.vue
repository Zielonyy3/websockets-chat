<template>
    <div class="col-7 px-0">
        <div class="px-4 pb-5 chat-box bg-white">
            <div class="px-1 py-2 mb-3 bg-white border-bottom"><h2 class="p-0 m-0">{{ activeUser.name }}</h2></div>

            <div class="px-4 py-5 chat-box bg-white">
                <message
                    v-for="message in messages"
                    v-bind:key="message.id"
                    v-bind:message="message"
                    v-bind:receiver-id="receiverId">
                    >
                </message>
            </div>


        </div>
        <send-message-form v-on:sent-message="sentMessage" v-bind:active-user="activeUser"></send-message-form>

    </div>
</template>

<script>
export default {
    mounted() {
        this.downloadMessages();
        this.listen();
    },
    props: ['active-user', 'receiver-id'],
    data: function () {
        return {
            messages: [],
        }
    },
    watch: {
        activeUser: function () {
            this.downloadMessages();
        },
    }
    ,
    methods: {
        downloadMessages() {
            axios.get('api/get-messages', {
                params: {
                    receiver_id: this.receiverId,
                    sender_id: this.activeUser.id,
                }
            }).then((response) => {
                this.messages = response.data;
            }).catch((error) => {
                console.error(error.response.data.message)
            })
        },
        sentMessage(message){
            this.messages.push(message);
        },
        listen() {
            Echo.channel('chat').listen('MessageSent',  (e) => {
                console.log('jest', e);
            })
        },

    }
}
</script>
