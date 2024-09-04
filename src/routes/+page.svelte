<script>
	
	import {Container, Card, Row, Col, Image}from '@sveltestrap/sveltestrap';
</script>
<svelte:head>
	<title>Home</title>
	<meta name="description" content="Svelte demo app" />
</svelte:head>
<Container>
  <Row cols={2} style="display:flex; justify-content:center; align-items:center; gap:30px;">
    <Col xs="5" style="display:flex; justify-content:center; align-items:center; height:150px; background-color:black; color:aqua; font-size:2rem; border-radius:15px; margin-bottom:20px;"><a href="/login_coachs" style="color:white; text-decoration:none;">Espace Coach</a></Col>
    <Col xs="5" style="display:flex; justify-content:center; align-items:center; height:150px; background-color:black; color:aqua; font-size:2rem; border-radius:15px;margin-bottom:20px;"><a href="/login_joueurs" style="color:white; text-decoration:none;">Espace Joueur</a></Col>
    <Col xs="5" style="display:flex; justify-content:center; align-items:center; height:150px; background-color:black; color:aqua; font-size:2rem; border-radius:15px;margin-bottom:20px;"><a href="/Actualités du club" style="color:white; text-decoration:none;">Actualités</a></Col>
    <Col xs="5" style="display:flex; justify-content:center; align-items:center; height:150px; background-color:black; color:aqua; font-size:2rem; border-radius:15px;margin-bottom:20px;"><a href="/" style="color:white; text-decoration:none;">Pôle Performance</a></Col>
    <Col xs="5" style="display:flex; justify-content:center; align-items:center; height:150px; background-color:black; color:aqua; font-size:2rem; border-radius:15px;margin-bottom:20px;"><a href="/" style="color:white; text-decoration:none;">Boutique</a></Col>
    <Col xs="5" style="display:flex; justify-content:center; align-items:center; height:150px; background-color:black; color:aqua; font-size:2rem; border-radius:15px;margin-bottom:20px;"><a href="/" style="color:white; text-decoration:none;">Devenez partenaires</a></Col>
  </Row>
</Container>

