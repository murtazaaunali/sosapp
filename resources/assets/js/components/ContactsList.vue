<template>
    <div class="col-sm-4 u-p-zero">
        <div class="height-58 u-p-small u-border-bottom u-border-right">
            <div class="c-field has-icon-right">
                <input class="c-input" type="text" placeholder="Search">
            </div>
        </div>
        <div class="c-messages">
            <a class="c-message" message-id="" href="javascript:void(0);" v-for="contact in sortedContacts" :key="contact.id" @click="selectContact(contact)" :class="{ 'selected': contact == selected }">
                <div class="o-media">
                    <div class="o-media__img u-mr-small">
                        <div class="c-avatar c-avatar--small">
                            <img class="c-avatar__img" :src="contact.picture" :alt="contact.name">
                        </div> 
                    </div>
                    <div class="o-media__body">
                        <h4 class="c-message__title">{{ contact.name }}
                        <span class="c-message__time">{{ contact.email }}</span>
                        <span class="c-message__title-meta">Crew: {{ contact.crew }}</span></h4>
                        
                    </div>
                </div>
                <span class="c-message__counter u-hidden-down@desktop" v-if="contact.unread">{{ contact.unread }}</span>
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            contacts: {
                type: Array,
                default: []
            }
        },
        data() {
            return {
                selected: this.contacts.length ? this.contacts[0] : null
            };
        },
        methods: {
            selectContact(contact) {
                this.selected = contact;
                this.$emit('selected', contact);
            }
        },
        computed: {
            sortedContacts() {
                return _.sortBy(this.contacts, [(contact) => {
                    if (contact == this.selected) {
                        return Infinity;
                    }

                    return contact.unread;
                }]).reverse();
            }
        }
    }
</script>