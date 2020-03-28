<template>
  <div>
    <button class='btn btn-link float-right' v-on:click='popCreate'>change</button>
    <popup ref='addQstn' iwidth='600' >
      <div method="post" v-on:click='closeToggle'>
        <div class='form-group'>
          <label for='title'>question title</label>
          <input type='text' class='form-control' id='title' name='title' v-model='title'/>
        </div>
        <div class='form-group'>
          <label for='content'>question content</label>
          <textarea class='form-control' id='content' name='content' v-model='desc'></textarea>
        </div>
        <ul class='list-inline '>
          <li class='list-inline-item align-top' v-for='(tag, index) in tags'><a>{{ tag.title }}</a>
            <button class='btn btn-danger btn-sm' v-on:click='removeTag(index)'>x</button>
          </li>
          <li class='list-inline-item align-top' v-if='tags.length < 5'>
            <ul class='list-unstyled'>
              <li>
                <a class="btn btn-default" v-on:click.stop='makeToggle'>add tag</a>
              </li>
              <li v-for="tag in atags" v-if='toggle == 1 && tag.use != 1'>
                <a class='btn btn-link ' v-on:click='addTag(tag)'>{{ tag.title }}</a>
              </li>
            </ul>
          </li>
        </ul>
        <button type="submit" class='btn btn-primary' v-on:click='edit'>submit question</button>
      </div>
    </popup>
  </div>
</template>

<script>
export default{
  props: ['iqid','ititle','idesc'],
  data: function (){
    return {
      show : 0,
      toggle: 0,
      title: null,
      desc: null,
      tags: [],
      atags: []
    }
  },
  mounted(){
    this.title = this.ititle;
    this.desc = this.idesc;
    this.getAllTags();
  },

  methods:{
    getAllTags: function(){
      axios
        .get('/tag/get')
        .then((response )=> {
          this.atags = response.data;
          this.getUsedTags();
        }
        );
    },
    getUsedTags: function(){
      axios
        .get('/question/'+this.iqid+'/tag')
        .then((response )=> {
          var tags_id = response.data;
          for(var i = 0; i < tags_id.length; i++){
            var rtagid = tags_id[i] - 1;
            this.tags.push(this.atags[rtagid]);
            this.atags[rtagid].use = 1;
          }
        }
        );
    },
    edit: function(){
      axios
        .put('/question/'+this.iqid,{
          'title' : this.title,
          'desc' : this.desc,
          'tags' : this.tags
        })
        .then((response )=> {
          location.reload();
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
