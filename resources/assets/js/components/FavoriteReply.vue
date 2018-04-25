<template>
    <button type ='submit' :class ='classes' @click="toggle">
		<span v-text="favoritesCount"></span> favourite
	</button>
</template>

<script>
    export default {

      props:['reply'],

       data() {
           return {
               favoritesCount : this.reply.favoritesCount,
               isLiked : this.reply.isLiked
           }
       },
       computed: {
           classes() {
            return ['btn', this.isLiked ? 'btn-primary' : 'btn-default'];
           },
           endpoint(){
              return '/replies/' + this.reply.id + '/favorites';
           }
       },
       methods: {
           toggle() {

            return this.isLiked ? this.destroy() : this.create();
           },
           create() {
                   axios.post(this.endpoint);
                   this.isLiked = true;
                   this.favoritesCount ++;
                   flash('Liked');
           },
           destroy() {
                   axios.delete(this.endpoint);
                   this.isLiked = false;
                   this.favoritesCount --;
                   flash('Disliked');
           }
       }
    }
</script>
