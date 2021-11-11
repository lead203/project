import { createStore } from 'vuex'

const store = createStore({
    state: () => ({
        products: [],
        cartProduct: [],
    }),
    getters: {
        getProducts: (state) => state.products,
    },
    actions: {
        fetchProduct: async (context) => {
            const response = await fetch('http://localhost:3000/products')
            let arrProducts = await response.json()
            context.commit('addProductToState', arrProducts)
        }
    },
    mutations: {
        addProductToCart: (state, product) => {
            state.cartProduct.push(product)
        },
        addProductToState: (state, products) => {
            state.products = products
        }
        
    }
})

export default store