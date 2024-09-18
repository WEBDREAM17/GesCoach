<script>
	import { Container, Image, Col, Row, Card, CardBody,CardHeader, CardTitle, CardSubtitle,Button,CardText} from "@sveltestrap/sveltestrap";
	import { onMount } from "svelte";
  import { page} from '$app/stores';
    const thumbnails = [
      ['src/lib/images/4.jpg','a href="/"'],
      ['src/lib/images/3.jpg',],
      ['src/lib/images/7.jpg',],
      ['src/lib/images/9.jpg',]
    
  ];
</script>  
<div style="display:flex; justify-content:center;" class="horizontal">
  {#each thumbnails as thumbnail}
   <Image style="width:300px; margin: 0 20px;;"   data-bs-theme="dark" thumbnail alt="This is a thumbnail Image" src={thumbnail} />
  {/each}
  
</div>


    <!-- <CardSubtitle style="color:aqua; font-size:2.5rem; padding:20px; border:solid black;text-align:center;">LES SPECIFIQUES</CardSubtitle>
    <CardText style="display:flex; align-items:center; justify-content:space-between; margin:10px 30px; ">

      <div style ="display:flex; flex-direction:column; margin-top:50px;">
        <img style="width:350px; height:250px;" src="src/lib/images/tableau-tactif-sport.jpg" alt="" >
        <a style="font-size:2rem; color:black; text-decoration:none;"  href="/">Spécifiques aux postes</a>
      </div>
      <div style ="display:flex; flex-direction:column; margin-top:50px;">
        <img style="width:350px; height:250px;" src="src/lib/images/technique_foot.jpg" alt="" >
        <a style="font-size:2rem; color:black; text-decoration:none;"  href="/">Spécifiques Techniques</a>
      </div>
      <div style ="display:flex; flex-direction:column; margin-top:50px;">
        <img style="width:350px; height:250px;" src="/src/lib/images/7.jpg" alt="" >
        <a style="font-size:2rem; color:black; text-decoration:none;"  href="/">Prépartion Pysiques</a>
      </div>
      <div style ="display:flex; flex-direction:column; margin-top:50px; ">
        <img style="width:350px; height:250px;" src="src/lib/images/mental.jpeg" alt="" >
        <a style="font-size:2rem; color:black; text-decoration:none; text-align:center;"  href="/">Prépartion Mentales</a>
      </div>
      
    </CardText> -->
    
  
