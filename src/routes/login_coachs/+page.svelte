<script>
	import { goto } from "$app/navigation";
import { Card, Table, Label, Input, Image, Col, Row, Button, Alert} from "@sveltestrap/sveltestrap";
  
let username = "";
let password = "";
let error = false;
let _servicepath = 'http://localhost/webservice/';


const handleLogin = async () => {
  console.log('handleLogin');
  const updateRoute = _servicepath + 'authentification.php';
  const data = new FormData();
			data.append('username',username);
      data.append('password',password);

			let res = await fetch(updateRoute, {
				method: 'POST',
				body: data
			});

      res = await res.json();


  // @ts-ignore
  if (res.status == '1') {
    // L'utilisateur est authentifié
    error = false;
    goto('/page_protegee', false);

  } else {
    // L'utilisateur n'est pas authentifié
    error = true;
    password = '';
  }
};
</script>
<h1>Login coachs</h1>
<Card style="background-color:black;">
  <Row>
    <Col style="margin-top:50px;" sm="12" md={{ size: 6, offset: 3 }}>
      <Label style="color:white;">Identifiant</Label>
      <Input type="text" id="username" bind:value={username} />
    </Col>
    <Col sm="8" md={{ size: 6, offset: 3 }}>
      <Label style="color:white;">Mot de passe</Label>
      <Input type="password" id="password" bind:value={password} />
    </Col>
    <Col sm="12" md={{ size: 6, offset: 3 }}>
      <a style="color:red;"href="/">Mot de passe oublié</a>
    </Col>
      
    <Col sm="6" md={{ size: 6, offset: 3 }}>
      <Button style="margin-bottom:50px;" on:click={handleLogin}>Se connecter</Button>
    </Col>
    {#if error}
      <Alert color="danger">Identifiant ou mot de passe incorrect</Alert>
    {/if}
  </Row>
</Card>





