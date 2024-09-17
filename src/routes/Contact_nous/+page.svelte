<script>
	import { Image,Col,Row,FormGroup, Input, Label, Button  } from '@sveltestrap/sveltestrap';
</script>
<h1 style="margin: 30px 0;">CONTACT</h1>
<Image fluid alt="This is a fluid Image" src="https://picsum.photos/id/518/1500/667.jpg" />
<Row>
    <Col xs="6" sm="4"><img src="" alt=""></Col>
    <Col xs="6" sm="4"><img src="" alt=""></Col>
    <Col xs="6" sm="4"><img src="" alt=""></Col>
</Row>
<Row>
  <Col xs="6"><Input type="text" placeholder="Votre nom" /></Col>
  <Col xs="6"><Input type="email" placeholder="Votre email" /></Col>
</Row>
<Row style="margin-top: 30px;">
  <Col><Input type="textarea" placeholder="textarea placeholder" /></Col>
</Row>
<Button color="primary">Envoyer</Button>




