<template>
    <button type ='submit' :class ='classes' @click="toggle">
		<span v-text="favoritesCount"></span> favourite
	</button>
</template>

<script>
    export default {

      props:['event'],

       data() {
           return {
               favoritesCount : this.event.favoritesCount,
               isLiked : this.event.isLiked
           }
       },
       computed: {
           classes() {
            return ['btn', this.isLiked ? 'btn-primary' : 'btn-default'];
           },
           endpoint(){
              return '/events/' + this.event.id + '/favorites';
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
