<template>
    <form action="#" class="bg-light">
        <div class="input-group">
            <input type="text" placeholder="Type a message" aria-describedby="button-addon2" v-model="text"
                   class="form-control rounded-0 border-0 py-4 bg-light">
            <div class="input-group-append">
                <button id="button-addon2" v-on:click.prevent="sendMessage" type="submit" class="btn btn-link"><i class="fa fa-paper-plane"></i></button>
            </div>
        </div>
    </form>
</template>

<script>
export default {
    mounted() {
    },
    props:['active-user'],
    data: function () {
        return {
            text: '',
        }
    },
    methods: {
        sendMessage() {
            axios.post('api/send-message', {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                receiver_id: this.activeUser.id,
                sender_id: $('meta[name="temp-user"]').attr('content'),
                text: this.text,
            }).then((response) => {
                this.text = '';
                this.$emit('sent-message', response.data);

            }).catch((error) => {
                console.warn(error.response.data.message)
            })
        }
    }
}
</script>
