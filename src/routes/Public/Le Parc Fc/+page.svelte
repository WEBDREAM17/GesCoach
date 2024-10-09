<script>
	import {
		Row,
		CardBody,
		CardHeader,
		CardTitle,
		TabContent,
		TabPane,
		
	} from '@sveltestrap/sveltestrap';
	import { onMount } from 'svelte';
	import { page } from '$app/stores';
</script>

<div class="cardHeader">
	<h1 class="title">Le Parc Football Club</h1>
</div>

<div class="cardBody">
	<Row>
		<p >
			L’Association Sportive 1901 de l’école de foot du Parc Football Club s’engage à offrir une
			pratique du football à tous les jeunes qui souhaitent s’inscrire dans notre école située à
			Marsille 03. Nous organisons des journées portes ouvertes pour permettre aux jeunes de
			découvrir notre école. Nous mettons à la disposition de nos membres nos installations,
			conformément aux règles de la Fédération Française de Football, en leur réservant des créneaux
			horaires dédiés.
		</p>
		<h2>Projet éducatif</h2>
		<p>
			Prenant en compte que le football est bien plus qu’un simple sport pour les enfants, notre
			école de football s’engage à offrir des actions citoyennes et socio-éducatives à nos jeunes
			adhérents, en utilisant le football comme un outil éducatif et de socialisation. Dans le cadre
			de la labellisation de notre club, nous mettons en place plusieurs initiatives en utilisant le
			Programme Educatif Fédéral. Nous collectons des jouets pour Les Restos du Cœur et organisons
			des ateliers sur des questions citoyennes durant les séances d’entrainements, impliquant ainsi
			les éducateurs et les enfants. Ces actions visent à renforcer la cohésion sociale et le
			développement citoyen de nos jeunes joueurs.
		</p>
		<h2 >Projet sportif</h2>
		<p>
			Nous avons pour objectif de suivre le programme de formation et de pédagogie de la FFF pour
			accompagner les jeunes joueurs dans leur développement sportif. Nous mettons tout en oeuvre
			pour offrir les meilleures conditions d’apprentissage à nos licenciés, en organisant des
			séances d’entraînement et des matchs encadrés par des éducateurs qualifiés. Pour atteindre ces
			objectifs, le bureau et les différentes commissions du club se réunissent régulièrement pour
			discuter des évolutions à envisager, que ce soit sur les plans sportifs, de communication, de
			discipline, d’événements, de sponsoring ou encore de questions techniques. Notre priorité est
			de créer un environnement propice à l’épanouissement sportif et éducatif de nos licenciés.
		</p>

		<h2 style="">Installations</h2>
		<p>1 - Stade Charpentier Auphan /</p>
		<p>1 - Gymnase Charpentier Auphan /</p>
	</Row>
</div>

<TabContent style="background-color:rgb(182, 219, 252)" on:tab={(e) => (status = e.detail)}>
	<TabPane tabId="Charte des joueurs du Parc FC" tab="Charte des joueurs du Parc FC" active>
		<p >
			Les joueurs qui intègrent Le Parc Football Club sont tenus de respecter les Chartes en
			vigueur, à savoir la Charte des joueurs, la Charte des parents, la Charte des éducateurs et la
			Charte des dirigeants.<br /><br />

			La Charte des joueurs implique les engagements suivants :<br /><br />

			<li>Prendre soin des installations et des équipements mis à disposition (terrains, vestiaires,
				ballons, chasubles, plots, etc.) lors des matchs ou des entraînements ; Posséder une gourde ou
				une bouteille individuelle pour boire et la laisser au bord du terrain ;</li><br />
				<li>Respecter les horaires de rendez-vous aux entraînements et se présenter aux vestiaires au plus
			tard 15 minutes avant la séance ;</li><br />
			<li>S’abstenir de toute remarque ou attitude désobligeante envers le club et ses membres (dirigeants,
			joueurs, éducateurs, parents) sous peine de sanction ;</li><br />
			<li>Donner une bonne image du club à l’extérieur (matchs, tournois, etc.) ;<br /><br />
			Ne pas jouer de matchs (amicaux, détection, etc.) ou de tournois avec un autre club que le Parc Football Club
			;</li><br />
			<li>Venir en tenue du club les jours de match ;</li><br />
			<li>Venir en tenue de sport les jours d’entraînement.</li><br />
			<li>De plus, les joueurs doivent respecter les éducateurs en acceptant leurs choix dans la constitution
				des équipes, en écoutant attentivement leurs conseils pour progresser, en prévenant l’éducateur
				en cas d’absence aux matchs et en acceptant que le joueur convoqué change d’équipe.</li><br />
			

			<li>Les joueurs doivent également respecter leurs partenaires en faisant preuve de loyauté, de
				camaraderie et de solidarité, ainsi que les arbitres même en cas d’injustice et les
				adversaires en serrant leur main avant et après les rencontres.</li><br />

			<li>Enfin, les joueurs du Pôle Perfectionnement et Jeunes doivent être présents régulièrement aux
				entraînements et aux matchs fixés par le club, prévenir en cas d’absence aux entraînements et
				faire preuve d’une pleine implication en ayant des objectifs élevés.</li><br />
		</p>
	</TabPane>
	<TabPane tabId="Charte des parents du Parc FC" tab="Charte des parents du Parc FC">
		<p>
			Les parents dont les enfants sont membres du Parc FC, Ecole de football à Marseille s’engagent à
			:<br /><br />

			<li>Respecter l’autorité et les décisions des éducateurs du club ;</li>
			<br />
			<li>
				Suivre les horaires de rendez-vous fixés par le club (pour déposer, récupérer et ramener
				leur enfant) ;
			</li>
			<br />
			<li>
				Confirmer la présence ou l’absence de leur enfant aux matchs en répondant aux convocations
				sur TeamPulse (ou tout autre outil de convocation) ;</li><br />
			
			<li>Mettre à jour leurs coordonnées sur Sporteasy (ou tout autre outil de convocation) ;</li>
			<br />
			<li>
				Informer le club par e-mail de tout changement de coordonnées (adresse, e-mail, numéro de
				téléphone père ou mère, etc…) ;
			</li>
			<br />
			<li>
				Informer l’entraîneur si les parents conduisent directement leur enfant sur le lieu du match
				(en extérieur) ;
			</li>
			<br />
			<li>
				Respecter les choix des éducateurs dans la composition des équipes, ne pas empiéter sur
				leurs prérogatives techniques ;
			</li>
			<br />
			<li>
				Adopter un comportement exemplaire sur le bord du terrain envers leur enfant, les joueurs,
				les éducateurs, les dirigeants et les clubs adverses ;
			</li>
			<br />
			<li>Respecter les arbitres lors des matchs en adoptant un comportement fairplay ;</li>
			<br />
			<li>
				Accompagner l’équipe dans laquelle évolue leur enfant lors des déplacements plusieurs fois
				dans la saison ;
			</li>
			<br />
			<li>
				Contacter le secrétariat du club dès que possible en cas de blessure survenue lors d’un
				match ou d’un entraînement pour déclarer l’accident ;
			</li>
			<br />
			<li>
				Ne pas intervenir durant les séances d’entraînement et les matchs (en donnant des conseils,
				critiques, recommandations ou autre). Le terrain est l’espace de jeu exclusif des joueurs,
				de l’entraîneur et des dirigeants.
			</li>
			<br />
			<li>
				Se porter volontaire pour devenir bénévole, arbitre ou dirigeant en fonction de leurs
				disponibilités.
			</li>
			<br /><br />
		</p>
	</TabPane>
</TabContent>

<style>
	.cardHeader{
		background-color:rgb(182, 219, 252);
		padding: 20px 10px;
		
	}
	.title {
		font-size:5rem;
		 margin: 10px 30px; 
		 color:black;
	}
	.cardBody {
		margin: 10px 30px;
	}
	h2{
		margin: 10px 0; 
		font-size:3rem; 
		color:black;
	}
	p{
		font-size:1.4rem;
		margin:20px;

	}
</style>
