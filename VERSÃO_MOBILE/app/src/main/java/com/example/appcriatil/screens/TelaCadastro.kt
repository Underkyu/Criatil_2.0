package com.example.appcriatil.screens

import androidx.compose.foundation.ExperimentalFoundationApi
import androidx.compose.foundation.background
import androidx.compose.foundation.layout.Box
import androidx.compose.foundation.layout.PaddingValues
import androidx.compose.foundation.layout.Spacer
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.foundation.layout.fillMaxWidth
import androidx.compose.foundation.layout.height
import androidx.compose.foundation.layout.padding
import androidx.compose.foundation.lazy.LazyColumn
import androidx.compose.foundation.text.KeyboardOptions
import androidx.compose.material.icons.Icons
import androidx.compose.material.icons.filled.Visibility
import androidx.compose.material.icons.filled.VisibilityOff
import androidx.compose.material3.ExperimentalMaterial3Api
import androidx.compose.material3.Icon
import androidx.compose.material3.IconButton
import androidx.compose.material3.OutlinedTextField
import androidx.compose.material3.Surface
import androidx.compose.material3.Text
import androidx.compose.runtime.Composable
import androidx.compose.runtime.getValue
import androidx.compose.runtime.mutableStateOf
import androidx.compose.runtime.remember
import androidx.compose.runtime.setValue
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.res.painterResource
import androidx.compose.ui.res.stringResource
import androidx.compose.ui.text.TextStyle
import androidx.compose.ui.text.input.KeyboardType
import androidx.compose.ui.text.input.PasswordVisualTransformation
import androidx.compose.ui.text.input.VisualTransformation
import androidx.compose.ui.tooling.preview.Preview
import androidx.compose.ui.unit.dp
import androidx.compose.ui.unit.sp
import com.example.appcriatil.MainActivity
import com.example.appcriatil.R
import com.example.appcriatil.RoomDB.Usuario
import com.example.appcriatil.components.ElementoBotao
import com.example.appcriatil.components.ElementoCheckbox
import com.example.appcriatil.components.ElementoDivisorComTexto
import com.example.appcriatil.components.ElementoFooter
import com.example.appcriatil.components.ElementoHeaderNav
import com.example.appcriatil.components.ElementoSenhaTextField
import com.example.appcriatil.components.ElementoTextField
import com.example.appcriatil.components.ElementoTextoLoginClicavel
import com.example.appcriatil.components.ElementoTextoTitulo
import com.example.appcriatil.components.PaddedItem
import com.example.appcriatil.navigation.CriatilAppRouter
import com.example.appcriatil.navigation.Screen
import com.example.appcriatil.viewModel.CriatilViewModel

@OptIn(ExperimentalMaterial3Api::class, ExperimentalFoundationApi::class)
@Composable
fun TelaCadastro (viewModel: CriatilViewModel, mainActivity: MainActivity) {
    var nomeValue by remember{
        mutableStateOf("")
    }
    var emailValue by remember{
        mutableStateOf("")
    }
    var telValue by remember{
        mutableStateOf("")
    }
    var cepValue by remember{
        mutableStateOf("")
    }
    var senhaValue by remember{
        mutableStateOf("")
    }

    var usuario = Usuario(
        nomeValue = nomeValue,
        emailValue = emailValue,
        telValue = telValue,
        cepValue = cepValue,
        senhaValue = senhaValue,
        logValue = false,
    )

    var usuarioList by remember{
        mutableStateOf(listOf<Usuario>())
    }

    val senhaVisivel = remember {
        mutableStateOf(false)
    }

    Surface(
        color = Color.White,
        modifier = Modifier
            .fillMaxSize()
            .background(Color.White)
    ) {
        Box(modifier = Modifier.fillMaxSize()) {
            LazyColumn(
                modifier = Modifier.fillMaxSize(),
                contentPadding = PaddingValues(horizontal = 0.dp)
            ) {
                stickyHeader {
                    ElementoHeaderNav(value = stringResource(id = R.string.Login), onClick = {
                        CriatilAppRouter.navigateTo(Screen.TelaDeLogin)
                    })
                }
                item {
                    PaddedItem {// Espaçamento
                        Spacer(modifier = Modifier.height(20.dp))
                    }
                }
                item {
                    PaddedItem {// Título
                        ElementoTextoTitulo(value = stringResource(R.string.crieConta))
                    }
                }
                item {
                    PaddedItem {// Espaçamento
                        Spacer(modifier = Modifier.height(20.dp))
                    }
                }
                item {
                    OutlinedTextField(
                        modifier = Modifier
                            .fillMaxWidth()
                            .background(Color.White)
                            .padding(horizontal = 8.dp, vertical = 8.dp),
                        textStyle = TextStyle(
                            color = Color.Black,
                            fontSize = 16.sp
                        ),
                        label = { Text(text = "Nome Completo") },
                        keyboardOptions = KeyboardOptions.Default,
                        value = nomeValue,
                        onValueChange = {
                            nomeValue = it
                        },
                        leadingIcon = {
                            Icon(painter = painterResource(id = R.drawable.icon_profile), contentDescription = "")
                        }
                    )
                }
                item {
                    OutlinedTextField(
                        modifier = Modifier
                            .fillMaxWidth()
                            .background(Color.White)
                            .padding(horizontal = 8.dp, vertical = 8.dp),
                        textStyle = TextStyle(
                            color = Color.Black,
                            fontSize = 16.sp
                        ),
                        label = { Text(text = "Email") },
                        keyboardOptions = KeyboardOptions.Default,
                        value = emailValue,
                        onValueChange = {
                            emailValue = it
                        },
                        leadingIcon = {
                            Icon(painter = painterResource(id = R.drawable.email), contentDescription = "")
                        }
                    )
                }
                item {
                    OutlinedTextField(
                        modifier = Modifier
                            .fillMaxWidth()
                            .background(Color.White)
                            .padding(horizontal = 8.dp, vertical = 8.dp),
                        textStyle = TextStyle(
                            color = Color.Black,
                            fontSize = 16.sp
                        ),
                        label = { Text(text = "Email") },
                        keyboardOptions = KeyboardOptions.Default,
                        value = telValue,
                        onValueChange = {
                            telValue = it
                        },
                        leadingIcon = {
                            Icon(painter = painterResource(id = R.drawable.telefone), contentDescription = "")
                        }
                    )
                }
                item {
                    OutlinedTextField(
                        modifier = Modifier
                            .fillMaxWidth()
                            .background(Color.White)
                            .padding(horizontal = 8.dp, vertical = 8.dp),
                        textStyle = TextStyle(
                            color = Color.Black,
                            fontSize = 16.sp
                        ),
                        label = { Text(text = "Email") },
                        keyboardOptions = KeyboardOptions.Default,
                        value = cepValue,
                        onValueChange = {
                            cepValue = it
                        },
                        leadingIcon = {
                            Icon(painter = painterResource(id = R.drawable.homeicon), contentDescription = "")
                        }
                    )
                }
                item {
                    OutlinedTextField(
                        modifier = Modifier
                            .fillMaxWidth()
                            .background(Color.White)
                            .padding(horizontal = 8.dp, vertical = 8.dp),
                        textStyle = TextStyle(
                            color = Color.Black,
                            fontSize = 16.sp
                        ),
                        label = { Text(text = "Senha") },
                        keyboardOptions = KeyboardOptions(keyboardType = KeyboardType.Password),
                        value = senhaValue,
                        onValueChange = {
                            senhaValue = it
                        },
                        leadingIcon = {
                            Icon(painter = painterResource(id = R.drawable.lock), contentDescription = "")
                        },
                        trailingIcon = {
                            val iconImage = if (senhaVisivel.value) {
                                Icons.Filled.Visibility
                            } else {
                                Icons.Filled.VisibilityOff
                            }

                            val description = if(senhaVisivel.value){
                                stringResource(id = R.string.esconderSenha)
                            }else{
                                stringResource(id = R.string.mostrarSenha)
                            }

                            IconButton(onClick = { senhaVisivel.value = !senhaVisivel.value }) {
                                Icon(imageVector = iconImage, contentDescription = description)
                            }
                        },
                        visualTransformation = if (senhaVisivel.value) VisualTransformation.None else PasswordVisualTransformation()
                    )
                }
                item {
                    PaddedItem {// Termos de uso
                        ElementoCheckbox(
                            value = stringResource(id = R.string.termos),
                            onTextSelected = {
                                CriatilAppRouter.navigateTo(Screen.TelaDeTermosECondicoes)
                            })
                    }
                }
                item {
                    PaddedItem {// Espaçamento
                        Spacer(modifier = Modifier.height(110.dp))
                    }
                }
                item {
                    PaddedItem {// Botão
                        ElementoBotao(value = stringResource(id = R.string.cadastrar), onClick = {

                        })
                    }
                }
                item {
                    PaddedItem {// Espaçamento
                        Spacer(modifier = Modifier.height(20.dp))
                    }
                }
                item {
                    PaddedItem {// Divisor com texto
                        ElementoDivisorComTexto()
                    }
                }
                item {
                    PaddedItem {// Redirecionamento para login
                        ElementoTextoLoginClicavel(
                            value = stringResource(id = R.string.irParaLogin),
                            onTextSelected = {
                                CriatilAppRouter.navigateTo(Screen.TelaDeLogin)
                            })
                    }
                }
            }
            ElementoFooter(
                modifier = Modifier
                    .align(Alignment.BottomCenter)
                    .fillMaxWidth()
            )
        }

    }
}

@Preview
@Composable
fun DefaultPreviewOfTelaCadastro() {
    //TelaCadastro()
}