<script>
	import { enhance } from '$app/forms';
	import { Card } from '@sveltestrap/sveltestrap';
  export let form
  $: console.log(form);
</script>
<body>
  <!-- section -->
  <section>
    <div class="container">
      <!-- Form -->
      <div class="form">
        <h3>Contact</h3>
        {#if form?.success}
        <p class="success">{form?.status || ""}</p>
        {:else}
        <form action="" class="contact-post" method="POST" use:enhance>
          <input class:error={form && !form?.name} type="text" name="name" id="name" value={form?.name || ""} placeholder="Votre nom" required >
          <input class:error={form && !form?.email} type="email" name="email" id="" value={form?.email || ""} placeholder="Votre email" required>
          <textarea class:error={form && !form?.message} name="message" id="" value={form?.message || ""} cols="30" rows="10" placeholder="Votre message" required></textarea>
          <input type="submit" value="Envoyer" class="send-button">
        </form>
        {/if}
      </div>

      <!-- Map -->

      <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5805.511009905169!2d5.3737044763716595!3d43.3193773711199!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12c9c061d7574d01%3A0xfaae6aed7d08c807!2sStade%20Charpentier!5e0!3m2!1sfr!2sfr!4v1728656127143!5m2!1sfr!2sfr"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </section>
</body>

<style>
  *{
    margin: 0;
    padding: 0;
    scroll-behavior: smooth;
    box-sizing: border-box;
  }
  body{
    width: 100%;
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    place-items: center;
    color: black;
    background-color:white;
  }
  .container{
max-width: 960px;
margin: auto;
width: 100%;
display: grid;
grid-template-columns: repeat(2, 1fr);
gap: 2rem;
background-color: gainsboro;
box-shadow: 0 0 1rem hsla(0, 0, 0, 20%);
border-radius: 0.5rem;
overflow: hidden;
  }
.form {
  padding: 20px;
}
.form h3 {
  font-size: 1.5rem;
  font-weight: 600;
  margin-bottom: 1rem;
}
.contact-post {
  display: grid;
  row-gap: 1rem;
}
.contact-post input {
  width: 100%;
  border: none;
  outline: none;
  background-color: white;
  padding: 10px;
  font-size: 1rem;
  color: black;
  border-radius: 0.5rem;

}
.contact-post .send-button {
  border: none;
  outline: none;
  font-size: 1rem;
  font-weight: 500;
  text-transform: uppercase;
  cursor: pointer;
  background-color: blue;
}
.contact-post .send-button:hover {
background: white ;
transition: 0.3s all linear;
}
.map iframe {
  width: 100%;
  height: 100%;
}
.success {  
  color: lightgreen;
}
.error {
  border:1px solid red;
}
</style>



