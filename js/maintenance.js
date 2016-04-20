var vm = new Vue({
	el: "#page",
	data: {
		maintenance_types: [],
		bikes: [],
		component_types: [],
		
		maintenanceDate: null,
		maintenance: { id: null, name: '' },
		bikeId: null,
		componentType: { id: null, name: ''},
		manufacturer: '',
		model: '',
		price: '',
		from: ''
	},
	compiled: function() {
		var self = this;
		$.when().then(function() {
			$.getJSON(window.base_url + "index.php/maintenance/maintenance_types").then(function(maintenanceTypes) {
				self.maintenance_types = maintenanceTypes;
				self.maintenance.id = maintenanceTypes[0].id;
			});
		}).then(function() {
			$.getJSON(window.base_url + "index.php/bike/1/",{}).then(function(bikes) {
				self.bikes = bikes;
				self.bikeId = bikes[0].id;
			});
		}).then(function() {
			$.getJSON(window.base_url + "index.php/component/component_types",{}).then(function(componentTypes) {
				self.component_types = componentTypes;
				self.componentType.id = componentTypes[0].id;
			});	
		}).done();
		$('#maintenanceDateInput').datepicker();
	},
	methods: {
		onSubmit: function() {
			var self = this;
			// Add component
			$.ajax({
				url: window.base_url 
					+ "index.php/component/"
					+ self.bikeId
					+ "/" + self.componentType.id 
					+ "/" + self.manufacturer 
					+ "/" + self.model 
					+ "/" + self.price 
					+ "/" + self.from,
				method: 'PUT',
				error: function(jqXHR, status, error) {
					console.log('Error saving component: ', error);
				}
			}).then(function(response) {
				console.log(response);
				alert('Component saved...');
			});
			// Add maintenance
		}
	}
});