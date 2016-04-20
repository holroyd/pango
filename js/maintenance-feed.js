Vue.component('maintenance-feed', {
	data: function() {
		return {feed_items: []}
	},
	template: '<div class=maintenance-feed><ul><li v-for="item in feed_items">' +
   	'<span class=maintenance-date>{{ item.maintenance_date_str }}</span>' +
	'<span class=maintenance-feed-item>{{ item.person_name }} {{ item.maintenance_type }} {{ item.bike_name }} {{ item.component_name }}</span>' +
  	'</li>' +
	'</ul></div>',
	compiled: function() {
		this.loadData();
	},
	methods: {
		loadData: function() {
			var self = this;
			$.getJSON("index.php/maintenance/json_feed",{}).then(function(data){
				self.feed_items = data;
				// setTimeout(self.loadData, 2000);
			});
		}
	}
});