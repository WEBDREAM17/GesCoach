<script>
	import Header from "./composants/Header.svelte";
	import Footer from "./composants/Footer.svelte";
	import { Container, Row, Col } from "@sveltestrap/sveltestrap";
</script>

	<Header/>
	<Container fluid>
		<Row>
			<Col style="margin:50px auto;" >
				<slot/>
			</Col>
		</Row>	
	</Container>	
  	<Footer/>