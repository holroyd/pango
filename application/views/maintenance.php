<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="page">
	<form v-on:submit.prevent="onSubmit">
	
	<table>
		<thead>
			<tr>
				<th colspan="2">Maintenance Details</th>
			</tr>
		</thead>
		<tbody>
			<tr><td>Date:</td><td><input type="date" id="maintenanceDateInput" v-bind:value="maintenanceDate" /></td></tr>
			<tr><td>User:</td><td>Simon Holroyd</td></tr>
			<tr>
				<td>Type:</td>
				<td>
					<select v-model="maintenance">
						<option v-for="maintenanceType in maintenance_types" 
							v-bind:value="{ id: maintenanceType.id, name: maintenanceType.name }">
							{{ maintenanceType.name }}
						</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Bike:</td>
				<td>
					<select v-model="bikeId">
						<option v-for="bike in bikes" v-bind:value="bike.id">{{ bike.name }}'s</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Component:</th>
				<td>
					<select v-model="componentType">
						<option v-for="ct in component_types" 
							v-bind:value="{ id: ct.id, name: ct.name }">
							{{ ct.name }}
						</option>
					</select>
				</td>
			</tr>
		</tbody>
	</table>
	
	<table>
		<thead>
			<tr>
				<th colspan="2">Component Details</th>
			</tr>
		</thead>
		<tbody>
			<tr><td>Type:</td><td>{{ componentType.name }}</td>
			<tr><td>Manufacturer:</td><td><input type=text v-model="manufacturer" /></td></tr>
			<tr><td>Mode:</td><td><input type=text v-model="model" /></td></tr>
			<tr><td>Price:</td><td><input type=text v-model="price" /></td></tr>
			<tr><td>From:</td><td><input type=text v-model="from" /></td></tr>
			</tr>
		</tbody>
	</table>
	<button type=submit>Save</button>
	</form>
</div>
