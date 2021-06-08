@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row rounded-lg overflow-hidden shadow " id="chatBox">
            <users-list v-on:change-user="changeUser" v-bind:users="users"
                        title="{{__t('common.recent', 'Recent')}}"></users-list>
            <conversation-section ref="conversationSection" v-bind:receiver-id="receiverId" v-bind:active-user="activeUser" v-if="activeUser.id != null"></conversation-section>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // const appS = new Vue({
        //     el: '#app',
        //     mounted(){
        //         console.log('Jestem')
        //         this.listen();
        //     },
        //     methods: {
        //         listen(){
        //             console.log('naslucuhuje');
        //             Echo.channel('chat')
        //                 .listen('MessageSent', (mess) => {
        //                     console.log(mess);
        //                 })
        //         },
        //     }
        // })

    </script>
@endsection

