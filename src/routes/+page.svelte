<script>
	import welcome from '$lib/images/svelte-welcome.webp';
	import welcome_fallback from '$lib/images/svelte-welcome.png';
	import {Container, Card, Row, Col, Image}from '@sveltestrap/sveltestrap';
</script>
<svelte:head>
	<title>Home</title>
	<meta name="description" content="Svelte demo app" />
</svelte:head>
<Container>
  <Row cols={2} style="display:flex; justify-content:center; align-items:center; gap:30px;">
    <Col xs="5" style="display:flex; justify-content:center; align-items:center; height:150px; background-color:black; color:aqua; font-size:2rem; border-radius:15px; margin-bottom:20px;"><a href="/login_coachs">Espace Coach</a></Col>
    <Col xs="5" style="display:flex; justify-content:center; align-items:center; height:150px; background-color:black; color:aqua; font-size:2rem; border-radius:15px;margin-bottom:20px;"><a href="/login_joueurs">Espace Joueur</a></Col>
    <Col xs="5" style="display:flex; justify-content:center; align-items:center; height:150px; background-color:black; color:aqua; font-size:2rem; border-radius:15px;margin-bottom:20px;">Actualités</Col>
    <Col xs="5" style="display:flex; justify-content:center; align-items:center; height:150px; background-color:black; color:aqua; font-size:2rem; border-radius:15px;margin-bottom:20px;">Pôle Performance</Col>
    <Col xs="5" style="display:flex; justify-content:center; align-items:center; height:150px; background-color:black; color:aqua; font-size:2rem; border-radius:15px;margin-bottom:20px;">Boutique</Col>
    <Col xs="5" style="display:flex; justify-content:center; align-items:center; height:150px; background-color:black; color:aqua; font-size:2rem; border-radius:15px;margin-bottom:20px;">Devenez partenaire</Col>
  </Row>
</Container>

