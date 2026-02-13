<section id="quick-request">

  <form id="quick-request-form" action="/anfrage" method="POST">

    <input 
      type="text" 
      name="from_address" 
      placeholder="Auszugsadresse" 
      class="form-input"
      required
    >

    <input 
      type="text" 
      name="to_address" 
      placeholder="Einzugsadresse" 
      class="form-input"
      required
    >

    <input 
      type="date" 
      name="move_date" 
      class="form-input"
      required
    >

    <input 
      type="email" 
      name="email" 
      placeholder="E-Mail"
      class="form-input"
      required
    >

    <input 
      type="tel" 
      name="phone" 
      placeholder="Telefonnummer"
      class="form-input"
      required
    >

    <button 
      type="submit" 
      class="btn btn-primary"
    >
      Kostenloses Angebot
    </button>

  </form>

</section>
