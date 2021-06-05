<template>
    <!-- Sender Message-->

    <div  v-if="isFromMe" class="media w-50 ml-auto mb-3">
        <div class="media-body">
            <div class="bg-primary rounded py-2 px-3 mb-2">
                <p class="text-small mb-0 text-white">{{message.text}}</p>
            </div>
            <p class="small text-muted">{{date}}</p>
        </div>
    </div>


    <!-- My Message-->
    <div v-else class="media w-50 mb-3"><img
        src="https://picsum.photos/seed/picsum/64/64" alt="user"
        width="50" class="rounded-circle">
        <div class="media-body ml-3">
            <div class="bg-light rounded py-2 px-3 mb-2">
                <p class="text-small mb-0 text-muted">{{message.text}}</p>
            </div>
            <p class="small text-muted">{{date}}</p>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {

    },
    props: ['message', 'receiver-id'],
    data: function() {
      return{
          isFromMe: Boolean(this.message.sender_id == this.receiverId),
            date: moment(this.message.updated_at).format('HH:mm | MMM DD '),
        }
    },
}
</script>
