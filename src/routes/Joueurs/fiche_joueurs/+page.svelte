<script>
	import { Table, Col, Row } from '@sveltestrap/sveltestrap';
	import { onMount } from 'svelte';
	import { page } from '$app/stores';
	import { Radar } from 'svelte-chartjs';  
	import { Bar } from 'svelte-chartjs';  
 	import { browser } from "$app/environment";
	import {
        Chart as ChartJS,
        Title,
        Tooltip,
        Legend,
        PointElement,
        RadialLinearScale,
        LineElement,
		Chart,  
		BarElement,
		CategoryScale,
		LinearScale,
    } from 'chart.js';

	import BarChart from '../../composants/BarChart.svelte';
	import { _servicepath } from '../../store';

	ChartJS.register(
        Title,
		Tooltip,
		Legend,
		BarElement,
		CategoryScale,
		LinearScale
    );

	let liste_joueurs = [];
	let liste_eval = [];
	let liste_poste = [];
	let eval1 = [];
	let eval2 = [];
	let eval3 = [];

	let eval1FormatteGraphPhysique = [];
	let eval2FormatteGraphPhysique = [];
	let eval3FormatteGraphPhysique = [];
	let eval1FormatteGraphMental = [];
	let eval2FormatteGraphMental = [];
	let eval3FormatteGraphMental = [];
	let eval1FormatteGraphTechnique = [];
	let eval2FormatteGraphTechnique = [];
	let eval3FormatteGraphTechnique = [];
	let eval1FormatteGraphTactique = [];
	let eval2FormatteGraphTactique = [];
	let eval3FormatteGraphTactique = [];
	let nom = '';
	let prenom = '';
	let date = '';
	let categorie = '';
	let equipe = '';
	let licence = '';
	let poste1 = '';
	let poste2 = '';
	let url_photo ='';
	let compteur = 0;
	let dataColors =["#2980b9","#9b59b6","#922b21", "green","red","red"];
	let id_joueur = '-1';
	var dataPhysique={};
	var dataMental={};
	var dataTechnique={};
	var dataTactique={};

	onMount(async () => {
		// @ts-ignore
		id_joueur = $page.url.searchParams.get('id');
		console.log('id_joueur : ' + id_joueur);
		await recupererJoueur();
		await recupererEval();
		await recupererPoste();
		ChargerGraphiquePhysique();
		ChargerGraphiqueMental();
		ChargerGraphiqueTechnique();
		ChargerGraphiqueTactique();
	});

	function getChartColorsArray(colors) {
        if (browser) {
            return colors.map(function (value) {
                var newValue = value.replace(" ", "");
                if (newValue.indexOf(",") === -1) {
                    var color = getComputedStyle(
                        document.documentElement
                    ).getPropertyValue(newValue);
                    if (color.indexOf("#") !== -1)
                        color = color.replace(" ", "");
                    if (color) return color;
                    else return newValue;
                } else {
                    var val = value.split(",");
                    if (val.length === 2) {
                        var rgbaColor = getComputedStyle(
                            document.documentElement
                        ).getPropertyValue(val[0]);
                        rgbaColor = "rgba(" + rgbaColor + "," + val[1] + ")";
                        return rgbaColor;
                    } else {
                        return newValue;
                    }
                }
            });
        }
    }

	function ChargerGraphiquePhysique()
	{
		var radarChartColors = getChartColorsArray(dataColors);

		if (radarChartColors) {

			dataPhysique = {
				labels: [
					"Endurance",
					"Vitesse",
					"Coordination",
					"Force",
				],
				datasets: [
					{
						label: "Eval 1",
						backgroundColor: 'rgba(113, 205, 205,0.5)',
						borderWidth:2,
						borderColor: 'rgba(113, 205, 205,1)',
						data: eval1FormatteGraphPhysique,
					},
					{
						label: "Eval 2",
						backgroundColor: 'rgba(170, 128, 252,0.5)',
						borderWidth:2,
						borderColor: 'rgba(170, 128, 252,1)',
						data: eval2FormatteGraphPhysique,
					},
					{
						label: "Eval 3",
						backgroundColor: 'rgba(255, 177, 101,0.5)',
						borderWidth:2,
						borderColor: 'rgba(255, 177, 101,1)',
						data: eval3FormatteGraphPhysique,
					},
				],				
			};
		}
	}

	function ChargerGraphiqueMental()
	{
		var radarChartColors = getChartColorsArray(dataColors);

		if (radarChartColors) {

			dataMental = {
				labels: [
					"Attitude",
					"Assiduité",
					"Leader",
					"Compétition",
				],
				datasets: [
					{
						label: "Eval 1",
						backgroundColor: 'rgba(113, 205, 205,0.5)',
						borderWidth:2,
						borderColor: 'rgba(113, 205, 205,1)',
						data: eval1FormatteGraphMental,
					},
					{
						label: "Eval 2",
						backgroundColor: 'rgba(170, 128, 252,0.5)',
						borderWidth:2,
						borderColor: 'rgba(170, 128, 252,1)',
						data: eval2FormatteGraphMental,
					},
					{
						label: "Eval 3",
						backgroundColor: 'rgba(255, 177, 101,0.5)',
						borderWidth:2,
						borderColor: 'rgba(255, 177, 101,1)',
						data: eval3FormatteGraphMental,
					},
				],				
			};
		}
	}

	function ChargerGraphiqueTechnique()
	{
		var radarChartColors = getChartColorsArray(dataColors);

		if (radarChartColors) {

			dataTechnique = {
				labels: [
					"Dribble",
					"Conduite",
					"Passe C.",
					"Passe L.",
					"Tir",
					"Tête",
					"1Touche",
					"Pied Faible",
				],
				datasets: [
					{
						label: "Eval 1",
						backgroundColor: 'rgba(113, 205, 205,0.5)',
						borderWidth:2,
						borderColor: 'rgba(113, 205, 205,1)',
						data: eval1FormatteGraphTechnique,
					},
					{
						label: "Eval 2",
						backgroundColor: 'rgba(170, 128, 252,0.5)',
						borderWidth:2,
						borderColor: 'rgba(170, 128, 252,1)',
						data: eval2FormatteGraphTechnique,
					},
					{
						label: "Eval 3",
						backgroundColor: 'rgba(255, 177, 101,0.5)',
						borderWidth:2,
						borderColor: 'rgba(255, 177, 101,1)',
						data: eval3FormatteGraphTechnique,
					},
				],				
			};
		}
	}

	function ChargerGraphiqueTactique()
	{
		var radarChartColors = getChartColorsArray(dataColors);

		if (radarChartColors) {

			dataTactique = {
				labels: [
					"Jeu défensif",
					"Jeu offensif",
					"Vision",
					"Décision",
				],
				datasets: [
					{
						label: "Eval 1",
						backgroundColor: 'rgba(113, 205, 205,0.5)',
						borderWidth:2,
						borderColor: 'rgba(113, 205, 205,1)',
						data: eval1FormatteGraphTactique,
					},
					{
						label: "Eval 2",
						backgroundColor: 'rgba(170, 128, 252,0.5)',
						borderWidth:2,
						borderColor: 'rgba(170, 128, 252,1)',
						data: eval2FormatteGraphTactique,
					},
					{
						label: "Eval 3",
						backgroundColor: 'rgba(255, 177, 101,0.5)',
						borderWidth:2,
						borderColor: 'rgba(255, 177, 101,1)',
						data: eval3FormatteGraphTactique,
					},
				],				
			};
		}
	}

	const recupererJoueur = async () => {
		try {
			//On crée le User
			const updateRoute = _servicepath + 'recuperer_personnes_id.php';
			const data = new FormData();
			data.append('id_personne', id_joueur);
			let res = await fetch(updateRoute, {
				method: 'POST',
				body: data
			});

			console.log('avant requete');
			res = await res.json();

			
			// @ts-ignore
			if (res.status == '1') {
				liste_joueurs = res.data;
				let monJoueur = liste_joueurs[0];
				nom = monJoueur.nom;
				prenom = monJoueur.prenom;
				date = monJoueur.date;
				equipe = monJoueur.equipe;
				licence = monJoueur.numero_licence;
				poste1 = monJoueur.poste1;
				poste2 = monJoueur.poste2;
				url_photo = monJoueur.url_photo;
				console.log('photo : ' + url_photo);
				//Si pas de photo alors on affiche la photo générique
				if(url_photo == null || url_photo == '') 
				{					
					url_photo = 'src/lib/images/avatar_garcon.png';
					console.log('photo2 : ' + url_photo);
				}
				else
				{
					url_photo = 'http://localhost/webservice/' + monJoueur.url_photo;
				}

				if (date == null) {
					date = 'date non renseigné';
				}
				
			} else {
				// @ts-ignore
				console.log(res.message);
			}
		} catch (error) {
			console.log(error);
		}
	};
	
	const recupererEval = async () => {
		try {
			//On crée le User
			const updateRoute = _servicepath + 'recuperer_eval_idjoueur.php';
			const data = new FormData();
			data.append('id_joueur', id_joueur);
			let res = await fetch(updateRoute, {
				method: 'POST',
				body: data
			});
			
			res = await res.json();
			// @ts-ignore
			if (res.status == '1') {
				console.log(res.data)
				liste_eval = res.data;
				
				liste_eval.forEach(evalu => {
					if(compteur == 0)
					{
						console.log('eval :');
						console.log(evalu);
						eval1 = evalu;
						eval1FormatteGraphPhysique[0] = evalu.noteEndurance;
						eval1FormatteGraphPhysique[1] = evalu.noteVitesse;
						eval1FormatteGraphPhysique[2] = evalu.noteCoordination;
						eval1FormatteGraphPhysique[3] = evalu.noteForce; 	
						eval1FormatteGraphMental[0]	= evalu.noteAttitude;			
						eval1FormatteGraphMental[1]	= evalu.noteAssiduite;
						eval1FormatteGraphMental[2]	= evalu.noteLeader;
						eval1FormatteGraphMental[3]	= evalu.noteCompete;
						eval1FormatteGraphTechnique[0] = evalu.noteDrible;
						eval1FormatteGraphTechnique[1] = evalu.noteConduite;
						eval1FormatteGraphTechnique[2] = evalu.notePasseC;
						eval1FormatteGraphTechnique[3] = evalu.notePasseL;
						eval1FormatteGraphTechnique[4] = evalu.noteTir;
						eval1FormatteGraphTechnique[5] = evalu.noteTete;
						eval1FormatteGraphTechnique[6] = evalu.noteTouche1;
						eval1FormatteGraphTechnique[7] = evalu.notePiedFaible;
						eval1FormatteGraphTactique[0] = evalu.noteJeuDef;
						eval1FormatteGraphTactique[1] = evalu.noteJeuOff;
						eval1FormatteGraphTactique[2] = evalu.noteVision;
						eval1FormatteGraphTactique[3] = evalu.noteDecision;
						
					}
					if(compteur == 1)
					{
						eval2 = evalu;
						eval2FormatteGraphPhysique[0] = evalu.noteEndurance;
						eval2FormatteGraphPhysique[1] = evalu.noteVitesse;
						eval2FormatteGraphPhysique[2] = evalu.noteCoordination;
						eval2FormatteGraphPhysique[3] = evalu.noteForce;
						eval2FormatteGraphMental[0]	= evalu.noteAttitude;			
						eval2FormatteGraphMental[1]	= evalu.noteAssiduite;
						eval2FormatteGraphMental[2]	= evalu.noteLeader;
						eval2FormatteGraphMental[3]	= evalu.noteCompete;
						eval2FormatteGraphTechnique[0] = evalu.noteDrible;
						eval2FormatteGraphTechnique[1] = evalu.noteConduite;
						eval2FormatteGraphTechnique[2] = evalu.notePasseC;
						eval2FormatteGraphTechnique[3] = evalu.notePasseL;
						eval2FormatteGraphTechnique[4] = evalu.noteTir;
						eval2FormatteGraphTechnique[5] = evalu.noteTete;
						eval2FormatteGraphTechnique[6] = evalu.noteTouche1;
						eval2FormatteGraphTechnique[7] = evalu.notePiedFaible;
						eval2FormatteGraphTactique[0] = evalu.noteJeuDef;
						eval2FormatteGraphTactique[1] = evalu.noteJeuOff;
						eval2FormatteGraphTactique[2] = evalu.noteVision;
						eval2FormatteGraphTactique[3] = evalu.noteDecision;
					}
					if(compteur == 2)
					{
						eval3 = evalu;
						eval3FormatteGraphPhysique[0] = evalu.noteEndurance;
						eval3FormatteGraphPhysique[1] = evalu.noteVitesse;
						eval3FormatteGraphPhysique[2] = evalu.noteCoordination;
						eval3FormatteGraphPhysique[3] = evalu.noteForce;
						eval3FormatteGraphMental[0]	= evalu.noteAttitude;			
						eval3FormatteGraphMental[1]	= evalu.noteAssiduite;
						eval3FormatteGraphMental[2]	= evalu.noteLeader;
						eval3FormatteGraphMental[3]	= evalu.noteCompete;
						eval3FormatteGraphTechnique[0] = evalu.noteDrible;
						eval3FormatteGraphTechnique[1] = evalu.noteConduite;
						eval3FormatteGraphTechnique[2] = evalu.notePasseC;
						eval3FormatteGraphTechnique[3] = evalu.notePasseL;
						eval3FormatteGraphTechnique[4] = evalu.noteTir;
						eval3FormatteGraphTechnique[5] = evalu.noteTete;
						eval3FormatteGraphTechnique[6] = evalu.noteTouche1;
						eval3FormatteGraphTechnique[7] = evalu.notePiedFaible;
						eval3FormatteGraphTactique[0] = evalu.noteJeuDef;
						eval3FormatteGraphTactique[1] = evalu.noteJeuOff;
						eval3FormatteGraphTactique[2] = evalu.noteVision;
						eval3FormatteGraphTactique[3] = evalu.noteDecision;
					}
					
					compteur = compteur+1;
				});

				
				if (date == null) {
					date = 'date non renseigné';
				}
				
			} else {
				// @ts-ignore
				console.log(res.message);
			}
		} catch (error) {
			console.log(error);
		}
	};

	const recupererPoste = async () => {
		try {
			//On crée le User
			const updateRoute = _servicepath + 'recuperer_poste.php';
			const data = new FormData();
			data.append('id_joueur', id_joueur);
			let res = await fetch(updateRoute, {
				method: 'POST',
				body: data
			});

			console.log('avant requete poste');
			res = await res.json();
			console.log('poste :');
			console.log(res);
			// @ts-ignore
			if (res.status == '1') {
				let posts = res.data;
				console.log(posts[0])
				if (posts [0]!=undefined)
				{
					poste1=posts[0].poste;
				}
				else{
					poste1 = '';
				}

				if (posts [1]!=undefined)
				{
					poste1=posts [1];
					
				}
				else{
					poste2 = '';
				}

				
				// @ts-ignore
				console.log(liste_joueurs);
			} else {
				// @ts-ignore
				console.log(res.message);
			}
		} catch (error) {
			console.log(error);
		}
	};

	
</script>

<div class="cardHeader">
	<img class="logoClub" src="src/lib/images/1.png" alt="" />
	<p>{nom} {prenom}</p>
	<p>{poste1} {poste2}</p>
	<img src="{url_photo}" width="150px"/>
	<button class="retour"><a href="/Joueurs/Liste_joueurs">Retour liste joueurs</a></button>
</div>
<div  style="border:2px solid black;margin:20px; display:flex; align-items:center;justify-content:center;">
	
		<Table striped>
			<thead>
				<h1>Capacité Physique</h1>
				<tr>
					<th>Aspect</th>			
					<th>{#if compteur>0}{eval1.date}{/if}</th>
					<th>{#if compteur>1}{eval2.date}{/if}</th>
					<th>{#if compteur>2}{eval3.date}{/if}</th>			
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Endurance</td>
					<td>{#if compteur>0}{eval1.noteEndurance}/10{/if}</td>
					<td>{#if compteur>1}{eval2.noteEndurance}/10{/if}</td>
					<td>{#if compteur>2}{eval3.noteEndurance}/10{/if}</td>
				</tr>			
				<tr>
					<td>Vitesse</td>
					<td>{#if compteur>0}{eval1.noteVitesse}/10{/if}</td>
					<td>{#if compteur>1}{eval2.noteVitesse}/10{/if}</td>
					<td>{#if compteur>2}{eval3.noteVitesse}/10{/if}</td>
				</tr>
				<tr>
					<td>Coordination</td>
					<td>{#if compteur>0}{eval1.noteCoordination}/10{/if}</td>
					<td>{#if compteur>1}{eval2.noteCoordination}/10{/if}</td>
					<td>{#if compteur>2}{eval3.noteCoordination}/10{/if}</td>
				</tr>
				<tr>
					<td>Force</td>
					<td>{#if compteur>0}{eval1.noteForce}/10{/if}</td>
					<td>{#if compteur>1}{eval2.noteForce}/10{/if}</td>
					<td>{#if compteur>2}{eval3.noteForce}/10{/if}</td>
				</tr>
			</tbody>
		</Table>
	<div style="border:2px solid black;margin:20px; width:500px;" xs="6"><BarChart data={dataPhysique}/><!--<Bar {data} option={{ responsive: true }} class="chartjs-chart" />--> <BarChart data={dataPhysique}/></div>
</div>

<Row style="border:2px solid black;margin:20px; display:flex; align-items:center;justify-content:center;">
	<Col style="border:2px solid black;margin:20px;">
		<Table striped>
			<thead>
				<h1>Capacités Mentales</h1>
			<tr>
				<th>Aspect</th>
				<th>{#if compteur>0}{eval1.date}{/if}</th>
				<th>{#if compteur>1}{eval2.date}{/if}</th>
				<th>{#if compteur>2}{eval3.date}{/if}</th>	
				</tr>
			</thead>
			<tbody>							
				<tr>
					<td>Attitude</td>
					<td>{#if compteur>0}{eval1.noteAttitude}/10{/if}</td>
					<td>{#if compteur>1}{eval2.noteAttitude}/10{/if}</td>
					<td>{#if compteur>2}{eval3.noteAttitude}/10{/if}</td>
				</tr>
				<tr>
					<td>Assiduité</td>
					<td>{#if compteur>0}{eval1.noteAssiduite}/10{/if}</td>
					<td>{#if compteur>1}{eval2.noteAssiduite}/10{/if}</td>
					<td>{#if compteur>2}{eval3.noteAssiduite}/10{/if}</td>
				</tr>
				<tr>
					<td>Leader</td>
					<td>{#if compteur>0}{eval1.noteLeader}/10{/if}</td>
					<td>{#if compteur>1}{eval2.noteLeader}/10{/if}</td>
					<td>{#if compteur>2}{eval3.noteLeader}/10{/if}</td>
				</tr>
				<tr>
					<td>Compétition</td>
					<td>{#if compteur>0}{eval1.noteCompete}/10{/if}</td>
					<td>{#if compteur>1}{eval2.noteCompete}/10{/if}</td>
					<td>{#if compteur>2}{eval3.noteCompete}/10{/if}</td>
				</tr>
			</tbody>
		</Table>
	</Col>
	<Col style="border:2px solid black;margin:20px; width:500px;" xs="6"><BarChart data={dataMental}/><!--<RadarChart notesEvals1={eval1FormatteGraph} notesEvals2={eval1FormatteGraph} notesEvals3={eval1FormatteGraph} dataColors={["blue","blue","red","red"]}/>--></Col>
</Row>
	
	<Row style="border:2px solid black;margin:20px; display:flex; align-items:center;justify-content:center;">
		<Col style="border:2px solid black;margin:20px;">
			<Table striped>
				<thead>
					<h1>Capacités Techniques</h1>
					<tr>
						<th>Aspect</th>
						<th>{#if compteur>0}{eval1.date}{/if}</th>
						<th>{#if compteur>1}{eval2.date}{/if}</th>
						<th>{#if compteur>2}{eval3.date}{/if}</th>	
						</tr>
					</thead>
					<tbody>							
						<tr>
							<td>Dribble</td>
							<td>{#if compteur>0}{eval1.noteDrible}/10{/if}</td>
							<td>{#if compteur>1}{eval2.noteDrible}/10{/if}</td>
							<td>{#if compteur>2}{eval3.noteDrible}/10{/if}</td>
						</tr>
						<tr>
							<td>Conduite</td>
							<td>{#if compteur>0}{eval1.noteConduite}/10{/if}</td>
							<td>{#if compteur>1}{eval2.noteConduite}/10{/if}</td>
							<td>{#if compteur>2}{eval3.noteConduite}/10{/if}</td>
						</tr>
						<tr>
							<td>Passe Courte</td>
							<td>{#if compteur>0}{eval1.notePasseC}/10{/if}</td>
							<td>{#if compteur>1}{eval2.notePasseC}/10{/if}</td>
							<td>{#if compteur>2}{eval3.notePasseC}/10{/if}</td>
						</tr>
						<tr>
							<td>Passe Longue</td>
							<td>{#if compteur>0}{eval1.notePasseL}/10{/if}</td>
							<td>{#if compteur>1}{eval2.notePasseL}/10{/if}</td>
							<td>{#if compteur>2}{eval3.notePasseL}/10{/if}</td>
						</tr>
						<tr>
							<td>Tir</td>
							<td>{#if compteur>0}{eval1.noteTir}/10{/if}</td>
							<td>{#if compteur>1}{eval2.noteTir}/10{/if}</td>
							<td>{#if compteur>2}{eval3.noteTir}/10{/if}</td>
						</tr>
						<tr>
							<td>Tête</td>
							<td>{#if compteur>0}{eval1.noteTete}/10{/if}</td>
							<td>{#if compteur>1}{eval2.noteTete}/10{/if}</td>
							<td>{#if compteur>2}{eval3.noteTete}/10{/if}</td>
						</tr>
						<tr>
							<td>1 Touche</td>
							<td>{#if compteur>0}{eval1.noteTouche1}/10{/if}</td>
							<td>{#if compteur>1}{eval2.noteTouche1}/10{/if}</td>
							<td>{#if compteur>2}{eval3.noteTouche1}/10{/if}</td>
						</tr>
						<tr>
							<td>Pied faible</td>
							<td>{#if compteur>0}{eval1.notePiedFaible}/10{/if}</td>
							<td>{#if compteur>1}{eval2.notePiedFaible}/10{/if}</td>
							<td>{#if compteur>2}{eval3.notePiedFaible}/10{/if}</td>
						</tr>
					</tbody>
			</Table>
		</Col>
		<Col style="border:2px solid black;margin:20px; width:500px;" xs="6"><BarChart data={dataTechnique}/><!--<RadarChart notesEvals1={eval1FormatteGraph} notesEvals2={eval1FormatteGraph} notesEvals3={eval1FormatteGraph} dataColors={["blue","blue","red","red"]}/>--></Col>
	</Row>

	<Row style="border:2px solid black;margin:20px; display:flex; align-items:center;justify-content:center;">
		<Col style="border:2px solid black;margin:20px;">
			<Table striped>
				<thead>
					<h1>Capacités Tactiques</h1>
					<tr>
						<th>Aspect</th>
						<th>{#if compteur>0}{eval1.date}{/if}</th>
						<th>{#if compteur>1}{eval2.date}{/if}</th>
						<th>{#if compteur>2}{eval3.date}{/if}</th>	
						</tr>
					</thead>
					<tbody>							
						<tr>
							<td>Jeu défensif</td>
							<td>{#if compteur>0}{eval1.noteJeuDef}/10{/if}</td>
							<td>{#if compteur>1}{eval2.noteJeuDef}/10{/if}</td>
							<td>{#if compteur>2}{eval3.noteJeuDef}/10{/if}</td>
						</tr>
						<tr>
							<td>Jeu offensif</td>
							<td>{#if compteur>0}{eval1.noteJeuOff}/10{/if}</td>
							<td>{#if compteur>1}{eval2.noteJeuOff}/10{/if}</td>
							<td>{#if compteur>2}{eval3.noteJeuOff}/10{/if}</td>
						</tr>
						<tr>
							<td>Vision du jeu</td>
							<td>{#if compteur>0}{eval1.noteVision}/10{/if}</td>
							<td>{#if compteur>1}{eval2.noteVision}/10{/if}</td>
							<td>{#if compteur>2}{eval3.noteVision}/10{/if}</td>
						</tr>
						<tr>
							<td>Décision</td>
							<td>{#if compteur>0}{eval1.noteDecision}/10{/if}</td>
							<td>{#if compteur>1}{eval2.noteDecision}/10{/if}</td>
							<td>{#if compteur>2}{eval3.noteDecision}/10{/if}</td>
						</tr>
					</tbody>
			</Table>
		</Col>
		<Col style="border:2px solid black;margin:20px; width:500px;" xs="6"><BarChart data={dataTactique}/><!--<RadarChart notesEvals1={eval1FormatteGraph} notesEvals2={eval1FormatteGraph} notesEvals3={eval1FormatteGraph} dataColors={["blue","blue","red","red"]}/>--></Col>
	</Row>
	<style>
	.cardHeader{
		border:2px solid black;
		 background-color: black; 
		 margin:20px; 
		 display:flex; 
		 align-items:center;
		justify-content: center;
		justify-content: space-between;
		
	}.logoClub {
		width: 150px;
	}
		.tableau {
			border:2px solid black;
			margin:20px;
		}
		.retour {
			background-color: rgb(107, 224, 251);
			margin-right: 50px;
			border-radius: 10px;
		}
		p {
			font-size: 2rem;
			color: rgb(107, 224, 251);
		}
		a{
			text-decoration: none;
		}
	</style>