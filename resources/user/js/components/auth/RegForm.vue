<template>
    <div class="auth-form-wrap">
        <div class="bg-blocks">
            <div class="bg-blockf">
                <form class="auth-form" @submit.prevent="submit">
                    <div class="auth-title">
                        <hr/>
                        <h4>Регистрация</h4>
                        <hr/>
                    </div>

                    <div class="input-container">
                        <div class="column">
                            <input placeholder="Имя" type="text" id="first_name" autofocus v-model="d_auth.first_name"/>
                            <input placeholder="Фамилия" type="text" id="last_name" autofocus v-model="d_auth.last_name"/>
                            <input placeholder="Отчество" type="text" id="middle_name" autofocus v-model="d_auth.middle_name"/>
                        </div>
                        <div class="column">
                            <input placeholder="E-mail" type="email" id="email" autofocus v-model="d_auth.email"/>
                            <input placeholder="Логин" type="text" id="login" autofocus v-model="d_auth.login"/>
                            <input placeholder="Пароль" type="password" id="password" autofocus v-model="d_auth.password"/>
                        </div>
                    </div>

                    <form-errors class="mb-3"
                                 v-if="d_error"
                                 :error="d_error"
                    />
                    <div class="d-flex align-items-center justify-content-center" style="width: 100%; margin-top:1em;">
                        <button type="submit">Зарегистрироваться</button>
                        <loading-component v-if="d_loading"/>
                    </div>
                </form>
            </div>
        </div>

    </div>
</template>

<script>
    import LoadingComponent from "@/user/js/components/utils/LoadingComponent";
    import FormErrors from "@/user/js/components/utils/FormErrors";

    export default {
        name: "RegForm",
        components: {FormErrors, LoadingComponent},
        data() {
            return {
                d_auth: {
                    first_name: null,
                    last_name: null,
                    middle_name: null,
                    email: null,
                    login: null,
                    password: null,
                },
                d_loading: false,
                d_error: null,
            }
        },

        methods: {
            async submit() {
                if (this.d_loading) return;
                this.d_error = null;
                this.d_loading = true;
                try {
                    await this.$store.dispatch("auth/register", this.d_auth);
                } catch (e) {
                    this.d_error = e;
                }
                this.d_loading = false;
                if(this.d_error == null) this.$store.commit('regReq')
            }
        }
    }
</script>

<style scoped lang="scss">
    .auth-form-wrap {
        display: flex;
        align-items: center;
        justify-content: center;
        position: fixed;
        width: 100%;
        height: 100%;
        backdrop-filter: blur(4px);
    }

    .bg-blocks {
        width: 45%;
        background: #343A48;
        border-radius: 5px;
        transform: rotate(-7.53deg);
        z-index: 1;
    }

    .bg-blockf {
        width: 100%;
        height: 100%;
        background: #9CA376;
        border-radius: 5px;
        transform: rotate(2.85deg);
        z-index: 2;
    }

    .auth-form {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;

        width: 100%;
        height: 100%;
        max-width: 100%;
        background: #ffffff;
        padding: 2em 15px;
        border-radius: 5px;
        z-index: 3;
        transform: rotate(4.68deg);

        .auth-title {
            display: flex;
            justify-content: center;
            width: 100%;
            margin-bottom: 3%;
        }
        .auth-title hr{
            width: 70%;
            border-top: 1.5px solid black;
            margin-left: 2em;
            margin-right: 2em;
        }

        .input-container {
            display: flex;
            margin-bottom: 3%;

            .column{
                width: 50%;
                text-align: center;
            }

            input{
                width: 75%;
            }
        }

        input {
            background: #DDDDDD;
            border-radius: 5px;
            border: 0px;
            margin: 0.5em;
            width: 30%;
            height: 2.5em;
            filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.15));
            padding-left: 1em;
            transition: .2s filter;
        }

        input::placeholder {
            font-style: normal;
            font-weight: normal;
            font-size: 1em;
            color: #9A9A9A;
        }

        input:focus {
            filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.35));
            outline:none;
        }
        input:hover {
            filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
            outline:none;
        }

        button {
            background: #DDDDDD;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.18);
            border: 0px;
            border-radius: 5px;
            width: 17em;
            height: 2.5em;

            font-style: normal;
            font-weight: normal;
            font-size: 1.1em;
            line-height: 24px;
            color: #706E6E;
            transition: .2s box-shadow;
        }
        button:hover {
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.28);
        }

        a {
            color: #9A9A9A;
            text-decoration: none;
        }
    }
</style>
