<template>
    <div>
        Your video with ID {{ video.id }} is currently:
        <span style="color: red;" v-if="processing">
           ﻿Processing...
        </span>
        <span style="color:green" v-else>
           Finished!
        </span>
    </div>
</template>

<script>
    export default {
        props: ['video'],

        data() {
            return {
                processing: true,
            }
        },

        created() {
            window.Echo.private(`videos.${this.video.id}`)
                .listen("VideoWasProcessed", (e) => {
                    this.processing = false;
            });
        },
    }
</script>