<section id="quick-request">

  <form id="quick-request-form" action="/anfrage" method="POST">

    <input 
      type="text" 
      name="from_address" 
      placeholder="Auszugsadresse" 
      required
    >

    <input 
      type="text" 
      name="to_address" 
      placeholder="Einzugsadresse" 
      required
    >

    <input 
      type="date" 
      name="move_date" 
      required
    >

    <input 
      type="email" 
      name="email" 
      placeholder="E-Mail"
      required
    >

    <input 
      type="tel" 
      name="phone" 
      placeholder="Telefonnummer"
      required
    >

    <button type="submit">
      Kostenloses Angebot
    </button>

  </form>

</section>
