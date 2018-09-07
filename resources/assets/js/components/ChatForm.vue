<template>
    <div class="form-group">
        <!--<input
            type="text"
            name="message"
            id="btn-input"
            class="form-control my-editor"
            placeholder="Escribe tú mensaje aquí......"
            v-model="newMessage"
            @keyup.enter="sendMessage">
            -->
       <textarea
            name="message"
            id="btn-input"
            class="form-control my-editor"
            placeholder="Escribe tú mensaje aquí......"
            v-model="newMessage"
            @keyup.enter="sendMessage">
        </textarea>
        <span class="form-group">
            <button
                class="btn btn-primary btn-block "
                id="btn-chat"
                @click="sendMessage"
            >
            Enviar
            </button>
        </span>
    </div>
</template>

<script>
    export default {
        props: ['user'],

        data() {
            return {
                newMessage: ''
            }
        },

        methods: {
            sendMessage() {
                this.$emit('messagesent', {
                    user: this.user,
                    message: this.newMessage
                });

                this.newMessage = ''
            }
        }
    }
</script>

