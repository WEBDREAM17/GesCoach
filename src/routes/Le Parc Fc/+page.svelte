<script>
	import {
		Container,
		Image,
		Col,
		Row,
		Card,
		CardBody,
		CardHeader,
		CardTitle,
    TabContent, 
    TabPane, Carousel, CarouselControl, CarouselItem 
	

	} from '@sveltestrap/sveltestrap';
	import { onMount } from 'svelte';
	import { page } from '$app/stores';
	
  const items = [
    'src/lib/images/WhatsApp Image 2024-08-21 at 09.51.05.jpeg',
    'src/lib/images/WhatsApp Image 2024-08-21 at 09.51.06.jpeg',
    'src/lib/images/WhatsApp Image 2024-08-21 at 10.07.55.jpeg'
  ];
  let activeIndex = 0; 
</script>

<CardHeader style="background-color:black">
	<CardTitle style="font-size:4rem; margin: 10px 30px; color:grey;">Le Parc Football Club</CardTitle
	>
</CardHeader>
<CardBody style=" margin: 50px 30px;">
	<Row style="display:flex; justify-content:space-between;" cols={2} >
		<Col style="width:800px;">
      <p style="font-size:1.4rem; ">
				L’Association Sportive 1901 de l’école de foot des du Parc Football Club s’engage à offrir une pratique du
				football à tous les jeunes qui souhaitent s’inscrire dans notre école située à Marsille 03. Nous
				organisons des journées portes ouvertes pour permettre aux jeunes de découvrir notre école.
				Nous mettons à la disposition de nos membres nos installations, conformément aux règles de
				la Fédération Française de Football, en leur réservant des créneaux horaires dédiés.
			</p>
      </Col>
		<Col style="width:600px;"
			><h2>Projet éducatif</h2>
			<p style="font-size:1.4rem; ">
				Prenant en compte que le football est bien plus qu’un simple sport pour les enfants, notre
				école de football s’engage à offrir des actions citoyennes et socio-éducatives à nos jeunes
				adhérents, en utilisant le football comme un outil éducatif et de socialisation. Dans le
				cadre de la labellisation de notre club, nous mettons en place plusieurs initiatives en
				utilisant le Programme Educatif Fédéral. Nous collectons des jouets pour Les Restos du Cœur
				et organisons des ateliers sur des questions citoyennes durant les séances d’entrainements,
				impliquant ainsi les éducateurs et les enfants. Ces actions visent à renforcer la cohésion
				sociale et le développement citoyen de nos jeunes joueurs.
			</p>
		</Col>
		<Col style="width:800px; margin-top:100px;"
			><h2>Projet sportif</h2>
			<p style="font-size:1.4rem; ">
				Nous avons pour objectif de suivre le programme de formation et de pédagogie de la FFF pour
				accompagner les jeunes joueurs dans leur développement sportif. Nous mettons tout en oeuvre
				pour offrir les meilleures conditions d’apprentissage à nos licenciés, en organisant des
				séances d’entraînement et des matchs encadrés par des éducateurs qualifiés. Pour atteindre
				ces objectifs, le bureau et les différentes commissions du club se réunissent régulièrement
				pour discuter des évolutions à envisager, que ce soit sur les plans sportifs, de
				communication, de discipline, d’événements, de sponsoring ou encore de questions techniques.
				Notre priorité est de créer un environnement propice à l’épanouissement sportif et éducatif
				de nos licenciés.
			</p>
		</Col>
		<Col style="width:600px; margin-top:100px;">
			<h2>Installations</h2>
			<p style="font-size:1.4rem; ">1 - Stade Charpentier Auphan /</p>
			<p style="font-size:1.4rem;">1 - Gymnase Charpentier Auphan /</p>
		</Col>
	</Row>
</CardBody>


<TabContent style="background-color:aqua;" on:tab={(e) => (status = e.detail)}>
  <TabPane tabId="Charte des joueurs du Parc FC" tab="Charte des joueurs du Parc FC" active>
   
    <p style="font-size:1.4rem; margin:50px;">
      Les joueurs qui intègrent Le Parc Football Club sont tenus de respecter les Chartes en vigueur, à savoir la Charte des joueurs, la Charte des parents, la Charte des éducateurs et la Charte des dirigeants.<br><br>

  La Charte des joueurs implique les engagements suivants :<br><br>

Prendre soin des installations et des équipements mis à disposition (terrains, vestiaires, ballons, chasubles, plots, etc.) lors des matchs ou des entraînements ;
Posséder une gourde ou une bouteille individuelle pour boire et la laisser au bord du terrain ;<br><br>
Respecter les horaires de rendez-vous aux entraînements et se présenter aux vestiaires au plus tard 15 minutes avant la séance ;<br><br>
S’abstenir de toute remarque ou attitude désobligeante envers le club et ses membres (dirigeants, joueurs, éducateurs, parents) sous peine de sanction ;<br><br>
Donner une bonne image du club à l’extérieur (matchs, tournois, etc.) ;<br><br>
Ne pas jouer de matchs (amicaux, détection, etc.) ou de tournois avec un autre club que PHOENIX ;<br><br>
Venir en tenue du club les jours de match ;<br><br>
Venir en tenue de sport les jours d’entraînement.<br><br>
De plus, les joueurs doivent respecter les éducateurs en acceptant leurs choix dans la constitution des équipes, en écoutant attentivement leurs conseils pour progresser, en prévenant l’éducateur en cas d’absence aux matchs et en acceptant que le joueur convoqué change d’équipe.<br><br>

Les joueurs doivent également respecter leurs partenaires en faisant preuve de loyauté, de camaraderie et de solidarité, ainsi que les arbitres même en cas d’injustice et les adversaires en serrant leur main avant et après les rencontres.<br><br>

Enfin, les joueurs du Pôle Perfectionnement et Jeunes doivent être présents régulièrement aux entraînements et aux matchs fixés par le club, prévenir en cas d’absence aux entraînements et faire preuve d’une pleine implication en ayant des objectifs élevés.<br><br>
     </p>
  </TabPane>
  <TabPane tabId="Charte des parents du Parc FC" tab="Charte des parents du Parc FC">
   
    <p style="font-size:1.4rem; margin:50px;">
      Les parents dont les enfants sont membres de PHOENIX Ecole de football à Béziers s’engagent à :<br><br>

      Respecter l’autorité et les décisions des éducateurs du club ;<br><br>
      Suivre les horaires de rendez-vous fixés par le club (pour déposer, récupérer et ramener leur enfant) ;<br><br>
      Confirmer la présence ou l’absence de leur enfant aux matchs en répondant aux convocations sur TeamPulse (ou tout autre outil de convocation) ;<br><br>
      Mettre à jour leurs coordonnées sur Sporteasy (ou tout autre outil de convocation) ;<br><br>
      Informer le club par e-mail de tout changement de coordonnées (adresse, e-mail, numéro de téléphone père ou mère, etc…) ;<br><br>
      Informer l’entraîneur si les parents conduisent directement leur enfant sur le lieu du match (en extérieur) ;<br><br>
      Respecter les choix des éducateurs dans la composition des équipes, ne pas empiéter sur leurs prérogatives techniques ;<br><br>
      Adopter un comportement exemplaire sur le bord du terrain envers leur enfant, les joueurs, les éducateurs, les dirigeants et les clubs adverses ;<br><br>
      Respecter les arbitres lors des matchs en adoptant un comportement fairplay ;<br><br>
      Accompagner l’équipe dans laquelle évolue leur enfant lors des déplacements plusieurs fois dans la saison ;<br><br>
      Contacter le secrétariat du club dès que possible en cas de blessure survenue lors d’un match ou d’un entraînement pour déclarer l’accident ;<br><br>
      Ne pas intervenir durant les séances d’entraînement et les matchs (en donnant des conseils, critiques, recommandations ou autre). Le terrain est l’espace de jeu exclusif des joueurs, de l’entraîneur et des dirigeants.<br><br>
      Se porter volontaire pour devenir bénévole, arbitre ou dirigeant en fonction de leurs disponibilités.<br><br>
     </p>
  </TabPane>
</TabContent>
<Carousel  {items} bind:activeIndex>
	<div class="carousel-inner">
	  {#each items as item, index}
		<CarouselItem bind:activeIndex itemIndex={index}>
		  <img src={item} class="d-block w-100" alt="{item} {index + 1}" />
		</CarouselItem>
	  {/each}
	</div>
  
	<CarouselControl direction="prev" bind:activeIndex {items} />
	<CarouselControl direction="next" bind:activeIndex {items} />
  </Carousel>
