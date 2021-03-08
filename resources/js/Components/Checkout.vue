<template>
  <div>
    <h1>Checkout</h1>

    <div v-if="cartData.products != null">
      <div v-for="product in cartData.products" :key="product.id">
        <p>{{ product['title'] }}</p>
        <p>Quantity: {{ product['qty'] }}</p>
        <p>$: {{ product['price'] }}</p>
      </div>

      <h2>Total $: {{ cartData.totalPrice }}</h2>
    </div>
    <h1>Checkout form</h1>

    <form @submit.prevent="submit">
      <div class="form-group">
        <label for="firstName">First name</label>
        <input
          type="text"
          class="form-control"
          name="firstName"
          id="firstName"
          v-model="fields.firstName"
        />
        <div v-if="errors && errors.firstName" class="text-danger">
          {{ errors.firstName[0] }}
        </div>
      </div>

      <div class="form-group">
        <label for="lastName">Last name</label>
        <input
          type="text"
          class="form-control"
          name="lastName"
          id="lastName"
          v-model="fields.lastName"
        />
        <div v-if="errors && errors.lastName" class="text-danger">
          {{ errors.lastName[0] }}
        </div>
      </div>

      <div class="form-group">
        <label for="zip">Zip</label>
        <input
          type="text"
          class="form-control"
          name="zip"
          id="zip"
          v-model="fields.zip"
        />
        <div v-if="errors && errors.zip" class="text-danger">
          {{ errors.zip[0] }}
        </div>
      </div>

      <div class="form-group">
        <label for="street">Street</label>
        <input
          type="text"
          class="form-control"
          name="street"
          id="street"
          v-model="fields.street"
        />
        <div v-if="errors && errors.street" class="text-danger">
          {{ errors.street[0] }}
        </div>
      </div>

      <div class="form-group">
        <label for="houseNumber">Housenumber</label>
        <input
          type="text"
          class="form-control"
          name="houseNumber"
          id="houseNumber"
          v-model="fields.houseNumber"
        />
        <div v-if="errors && errors.houseNumber" class="text-danger">
          {{ errors.houseNumber[0] }}
        </div>
      </div>

      <div class="form-group">
        <label for="email">E-mail</label>
        <input
          type="email"
          class="form-control"
          name="email"
          id="email"
          v-model="fields.email"
        />
        <div v-if="errors && errors.email" class="text-danger">
          {{ errors.email[0] }}
        </div>
      </div>

      <div class="form-group">

        <input
          type="hidden"
          class="form-control"
          name="cart"
          id="cart"
          v-model="fields.cart"
        />
      </div>

      <button type="submit" class="btn btn-primary">Send message</button>

      <div v-if="success" class="alert alert-success mt-3">Message sent!</div>
    </form>
  </div>
</template>

<script>
import {mapActions, mapGetters} from 'vuex';
import CheckoutMixin from '../CheckoutMixin';

export default {
    name: 'Checkout',
    mixins: [CheckoutMixin],

    data() {
        return {
            action: '/checkout ',
        };
    },
    computed: {
        ...mapActions('cart', ['setState', 'getCartProducts']),
        ...mapGetters('cart', { cartData: 'getCart' }),
    },
    methods: {
        ...mapActions('cart', [
            'addToCartAction',
            'addOne',
            'reduceOne',
            'removeAll',
        ]),
        addToCart(productId) {
            this.addToCartAction(productId);
        },
    },
};
</script>