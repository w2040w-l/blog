<template>
  <li class='align-bottom list-inline-item'>
    <button v-on:click='popCreate' class='btn btn-primary'>{{ $root.tran('ask_question') }}</button>
    <popup ref='addQstn' iwidth='600' >
      <div method="post" v-on:click='closeToggle'>
        <div class='form-group'>
          <label for='title'>{{ $root.tran('question_title') }}</label>
          <input type='text' class='form-control' id='title' name='title' v-model='title'/>
        </div>
        <div class='form-group'>
          <label for='content'>{{ $root.tran('question_content') }}</label>
          <textarea class='form-control' id='content' name='content' v-model='desc' v-on:keyup="resize" v-bind:rows='row'></textarea>
        </div>
        <ul class='list-inline '>
          <li class='list-inline-item align-top' v-for='(tag, index) in tags'><a>{{ tag.title }}</a>
            <button class='btn btn-danger btn-sm' v-on:click='removeTag(index)'>x</button>
          </li>
          <li class='list-inline-item align-top' v-if='tags.length < 5'>
            <ul class='list-unstyled'>
              <li>
                <a class="btn btn-default" v-on:click.stop='makeToggle'>{{ $root.tran('add_tag') }}</a>
              </li>
              <li v-for="tag in atags" v-if='toggle == 1 && tag.use != 1'>
                <a class='btn btn-link ' v-on:click='addTag(tag)'>{{ tag.title }}</a>
              </li>
            </ul>
          </li>
        </ul>
        <button type="submit" class='btn btn-primary' v-on:click='create'>{{ $root.tran('submit_question') }}</button>
      </div>
    </popup>
  </li>
</template>

<script>
export default{
  props: [],
  data: function (){
    return {
      show : 0,
      row: 3,
      toggle: 0,
      title: null,
      desc: null,
      tags: [],
      atags: []
    }
  },
  mounted(){
    this.getAllTags();
  },

  methods:{
    resize: function(event){
      this.row = (event.target.scrollHeight - event.target.scrollHeight%24) / 24 ;
    },
    getAllTags: function(){
      axios
        .get('/tag/get')
        .then((response )=> {
          this.atags = response.data;
        }
        );
    },

    create: function(){
      axios
        .post('/question',{
          'title' : this.title,
          'desc' : this.desc,
          'tags' : this.tags
        })
        .then((response )=> {
          location.href =response.data;
        })
        .catch((error, response) => {
          this.$root.$refs.error.tip(error.response.data.errors);
        })
      ;
    },
    popCreate:function () {
      this.$refs.addQstn.show = 1;
    },
    makeToggle: function (){
      this.toggle = 1 - this.toggle;
    },
    closeToggle: function (){
      this.toggle = 0;
    },
    addTag: function (tag){
      this.tags.push(tag);
      tag.use = 1;
    },
    removeTag: function(index){
      this.tags[index].use = 0;
      this.tags.splice(index, 1);
    }
  }
}
</script>
