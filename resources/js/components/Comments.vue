<template>
  <div class='card' v-if='show'>
    <div class='card-body'>
      <div v-for="(comment, index) in comments" class='card'>
        <div class='card-body'>
          <a v-if="comment.reply_user == null " v-bind:href="'/user/'+comment.user.id">{{ comment.user.username }}</a>
          <span v-else>
            <a v-bind:href="'/user/'+comment.user.id">{{ comment.user.username }}</a> {{ $root.tran('reply_to') }} <a v-bind:href="'/user/'+comment.reply">{{ comment.reply_user }}</a>
          </span>
        <br/>
          {{ comment.content }}
        </br>
          <button v-on:click='reply(comment.id , comment.user.username)' 
            class='btn-sm btn-link' >{{ $root.tran('reply') }}</button>
          <button v-if='iuid == comment.user.id' v-on:click='removeComment(index, comment.id)' 
            class='btn-sm btn-danger btn-link' >{{ $root.tran('delete') }}</button>
        </div>
      </div>
      <div v-if='iuid' class='form-group'>
        <label for='content'>{{ $root.tran('comment_content') }}</label>
        <textarea v-if='reply_user' ref='reply' v-bind:placeholder='$root.tran("reply") + " " + this.reply_user' class='form-control' id='content' name='content' v-model='content'>
        </textarea>
        <textarea v-else ref='reply' class='form-control' id='content' name='content' v-model='content'>
        </textarea>
        <button type="submit" class='btn btn-primary' v-on:click='create'>{{ $root.tran('submit_comment') }}</button>
        <button class='btn ' v-on:click='clear'>{{ $root.tran('cancel') }}</button>
      </div>
    </div>
  </div>
</template>

<script>
export default{
  props: ['iuid', 'iusername', 'iqid', 'iaid'],
  data: function (){
    return {
      comments: [],
      show : 0,
      init : 0,
      content: null,
      reply_user: null,
    }
  },
  mounted(){
  },

  methods:{
    reply: function(index, username){
      this.reply_user = username;
      this.replyid = index;
      this.content = null;
      this.$refs.reply.focus();
    },
    clear: function(){
      this.reply_user = null;
      this.replyid = null;
      this.content = null;
    },
    create: function(){
      axios
        .post('/question/'+this.iqid+'/answer/'+this.iaid+'/comment',{
          'content' : this.content,
          'reply_user' : this.reply_user,
          'reply' : this.replyid,
        })
        .then((response )=> {
          this.clear();
          this.comments.push(response.data);
          this.$parent.$refs['cbutton'+this.iaid].count++;
        })
        .catch((error, response) => {
          this.$root.$refs.error.tip(error.response.data.errors);
        })
      ;
    },
    removeComment: function(index, cid){
      axios
        .delete('/question/'+this.iqid+'/answer/'+this.iaid+'/comment/'+cid)
        .then((response )=> {
          this.comments.splice(index, 1);
          this.$parent.$refs['cbutton'+this.iaid].count--;
        }
        );
    },
    change:function () {
      this.show = 1 - this.show;
      if(this.init == 0){
        this.init = 1;
        axios
          .get('/question/'+this.iqid+'/answer/'+this.iaid+'/comment')
          .then((response )=> {
            this.comments = response.data;
          }
          );
      }
    }

  }
}
</script>
