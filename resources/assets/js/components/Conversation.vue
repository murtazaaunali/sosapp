<template>
    <div class="col-sm-8 u-p-zero">
        <div class="height-58 u-flex u-align-items-center u-border-bottom">
            <h5 class="u-mb-zero u-ml-medium">{{ contact ? contact.name : 'Select a Contact' }}</h5>
            <!-- <span class="u-ml-xsmall u-text-tiny u-mr-auto">
                <i class="fa fa-circle u-color-success"></i>
            </span> -->
        </div>
        <MessagesFeed :contact="contact" :messages="messages"/>
        <MessageComposer @send="sendMessage"/>
    </div> 
</template>

<script>
    import MessagesFeed from './MessagesFeed';
    import MessageComposer from './MessageComposer';

    export default {
        props: {
            contact: {
                type: Object,
                default: null
            },
            messages: {
                type: Array,
                default: []
            }
        },
        methods: {
            sendMessage(text) {
                if (!this.contact) {
                    return;
                }

                axios.post('/employee/conversation/send', {
                    contact_id: this.contact.id,
                    text: text
                }).then((response) => {
                    this.$emit('new', response.data);
                })
            }
        },
        components: {MessagesFeed, MessageComposer}
    }
</script>
