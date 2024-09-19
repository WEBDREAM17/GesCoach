<script>
	import {
		Container,
		Table,
		Row,
		Col
		
		
		
	} from '@sveltestrap/sveltestrap';
	import { onMount } from 'svelte';
	import { page } from '$app/stores';
</script>

<Container fluid>
	<Row
	style="display:flex; align-items:center; border:2px solid black;margin:20px;">
	<Col>
		<img style="width:200px;" class="logoClub" src="src/lib/images/WhatsApp Image 2024-09-05 at 11.36.21.jpeg" alt="" />
	</Col>
	<Col xs="auto">
		<h1>Planning des entrainements de l'écôle de football du "Parc FC"</h1>
		<p>Bienvenue sur la page du planning des entraînements de notre école de foot, « Le Parc Football Club». <br>Cette page est destinée à vous fournir toutes les informations nécessaires concernant les horaires et les jours d’entraînement pour chaque catégorie.</p>
	</Col>
</Row>
<Row style="margin:20px;">
	<Table bordered>
		<thead>
		  <tr>
			<th>Catégorie</th>
			<th>Coach</th>
			<th>Lundi</th>
			<th>Mardi</th>
			<th>Mercredi</th>
			<th>Jeudi</th>
			<th>Vendredi</th>
			<th>Samedi</th>
			<th>Dimanche</th>
			<th>Terrain</th>
		  </tr>
		</thead>
		<tbody>
		  <tr>
			<th scope="row">U6</th>
			<td>Camal/Aymen/moundhi</td>
			<td></td>
			<td>18H - 19H30</td>
			<td></td>
			<td>18H - 19H30</td>
			<td></td>
			<td>Plateau interne (matin)</td>
			<td></td>
			<td></td>
		  </tr>
		  <tr>
			<th scope="row">U7</th>
			<td>Camal/Aymen/moundhi</td>
			<td></td>
			<td>18h - 19H30</td>
			<td></td>
			<td>18H - 19H30</td>
			<td></td>
			<td>Plateau interne(matin)</td>
			<td></td>
			<td></td>
		  </tr>
		  <tr>
			<th scope="row">U8</th>
			<td>Kader/Nourdine</td>
			<td>18H - 19H30</td>
			<td>12H - 13H30</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		  </tr>
		  <tr>
			<th scope="row">U9</th>
			<td>Salim/Rahim</td>
			<td></td>
			<td>18H - 19H30</td>
			<td>13H30 - 15H</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		  </tr>
		  <tr>
			<th scope="row">U10</th>
			<td>Kader</td>
			<td></td>
			<td>18H30 - 19H30</td>
			<td>13H30 - 15H</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		  </tr>
		  <tr>
			<th scope="row">U11 - 1</th>
			<td>Amine / </td>
			<td></td>
			<td></td>
			<td>18H - 19H30</td>
			<td></td>
			<td>18H - 19H30</td>
			<td></td>
			<td></td>
			<td></td>
		  </tr>
		  <tr>
			<th scope="row">U11 - 2</th>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		  </tr>
		  <tr>
			<th scope="row">U12 - 1</th>
			<td>Brahim </td>
			<td>18H - 19H30</td>
			<td></td>
			<td></td>
			<td>18H - 19H30</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		  </tr>
		  <tr>
			<th scope="row">U12 - 2</th>
			<td></td>
			<td></td>
			<td></td>
			<td>18H - 19H30</td>
			<td></td>
			<td>18H - 19H30</td>
			<td></td>
			<td></td>
			<td></td>
		  </tr>
		  <tr>
			<th scope="row">U13</th>
			<td>Mahmoud et Jamel</td>
			<td></td>
			<td>18h - 19H30</td>
			<td></td>
			<td>18H - 19H30</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		  </tr>
		  <tr>
			<th scope="row">Pôle integration junior</th>
			<td>Omar Clovis</td>
			<td>18H - 19H30</td>
			<td></td>
			<td>16H30 - 18h</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		  </tr>
		  <tr>
			<th scope="row">Pôle integration senior</th>
			<td>Kader</td>
			<td></td>
			<td></td>
			<td>15h - 16H30</td>
			<td>18H - 19H30</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		  </tr>
		</tbody>
	  </Table>
	</Row>
  </Container>
