<template>
  <div class="container">
    <h1>Citas</h1>
    <button @click="getRandomQuote">Obtener cita aleatoria</button>
    
    <div v-if="loading" class="loading">
      Cargando...
    </div>
    
    <div v-if="quote && !loading" class="quote-container">
      <blockquote>"{{ quote.quote }}"</blockquote>
      <cite>- {{ quote.author }}</cite>
    </div>
    
    <div v-if="error" class="error">
      {{ error }}
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      quote: null,
      loading: false,
      error: null
    }
  },
  methods: {
    async getRandomQuote() {
      this.loading = true;
      this.error = null;
      
      try {
        const response = await fetch('/api/quotes/random');
        if (!response.ok) throw new Error('Error al obtener la cita');
        this.quote = await response.json();
      } catch (err) {
        this.error = err.message;
      } finally {
        this.loading = false;
      }
    }
  }
}
</script>

<style scoped>
.container {
  max-width: 800px;
  margin: 2rem auto;
  padding: 1rem;
  text-align: center;
}

button {
  padding: 0.5rem 1rem;
  background: #3490dc;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  margin-bottom: 1rem;
}

.quote-container {
  margin: 2rem 0;
  padding: 1rem;
  background: #f8fafc;
  border-left: 4px solid #3490dc;
}

blockquote {
  font-size: 1.2rem;
  margin-bottom: 0.5rem;
}

cite {
  display: block;
  font-style: normal;
  color: #666;
}

.loading {
  color: #3490dc;
}

.error {
  color: #e3342f;
}
</style>