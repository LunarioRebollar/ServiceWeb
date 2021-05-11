<template>
  <div>
    <p v-for="msg in message">
      <b>{{msg.user}} : </b> {{msg.message}}
    </p>
  </div>
</template>
<script>
export default {
  data() {
    return {
      message: [],
    }
  },
  mounted(){
   console.log("Mounted app message");
   // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;
    const APP_KEY = 'XXXXXXXXXXXXXXXXXXXX'
    var pusher = new Pusher(APP_KEY, {
      cluster: 'us2',
      forceTLS: true
    });
    const self = this
    var channel = pusher.subscribe('channel-tutofox');
    channel.bind('event-pusher', function(data) {
      // app.messages.push(JSON.stringify(data));
      const message = self.message
      message.push(data.data)
    }); 
  }
}
</script>