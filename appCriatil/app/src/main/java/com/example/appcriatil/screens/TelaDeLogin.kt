package com.example.appcriatil.screens

import androidx.compose.foundation.ExperimentalFoundationApi
import androidx.compose.foundation.background
import androidx.compose.foundation.layout.Box
import androidx.compose.foundation.layout.PaddingValues
import androidx.compose.foundation.layout.Spacer
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.foundation.layout.fillMaxWidth
import androidx.compose.foundation.layout.height
import androidx.compose.foundation.lazy.LazyColumn
import androidx.compose.material3.ExperimentalMaterial3Api
import androidx.compose.material3.Surface
import androidx.compose.runtime.Composable
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.res.painterResource
import androidx.compose.ui.res.stringResource
import androidx.compose.ui.tooling.preview.Preview
import androidx.compose.ui.unit.dp
import com.example.appcriatil.R
import com.example.appcriatil.components.ElementoBotao
import com.example.appcriatil.components.ElementoCheckbox
import com.example.appcriatil.components.ElementoDivisorComTexto
import com.example.appcriatil.components.ElementoFooter
import com.example.appcriatil.components.ElementoHeaderNav
import com.example.appcriatil.components.ElementoSenhaTextField
import com.example.appcriatil.components.ElementoTextField
import com.example.appcriatil.components.ElementoTextoCadastroClicavel
import com.example.appcriatil.components.ElementoTextoTitulo
import com.example.appcriatil.components.PaddedItem
import com.example.appcriatil.navigation.CriatilAppRouter
import com.example.appcriatil.navigation.Screen
import com.example.appcriatil.navigation.SystemBackButtonHandler

@OptIn(ExperimentalMaterial3Api::class, ExperimentalFoundationApi::class)
@Composable
fun TelaDeLogin() {
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
                    ElementoHeaderNav(value = stringResource(id = R.string.Cadastro), onClick = {
                        CriatilAppRouter.navigateTo(Screen.TelaCadastro)
                    })
                }
                item {
                    PaddedItem { // Espaçamento
                        Spacer(modifier = Modifier.height(20.dp))
                    }
                }
                item {
                    PaddedItem { // Título e subtítulo
                        ElementoTextoTitulo(value = stringResource(R.string.bem_vindo_de_volta))
                    }
                }
                item {
                    PaddedItem { // Espaçamento
                        Spacer(modifier = Modifier.height(20.dp))
                    }
                }
                item {
                    PaddedItem { // Campos
                        ElementoTextField(labelValue = stringResource(id = R.string.email), painterResource = painterResource(id = R.drawable.email))
                    }
                }
                item {
                    PaddedItem { // Divisor com texto
                        ElementoSenhaTextField(labelValue = stringResource(id = R.string.senha), painterResource = painterResource(id = R.drawable.lock))
                    }
                }

                item {
                    PaddedItem { // Termos de uso
                        ElementoCheckbox(value = stringResource(id = R.string.termos), onTextSelected = {
                            CriatilAppRouter.navigateTo(Screen.TelaDeTermosECondicoes)
                        })
                    }
                }
                item {
                    PaddedItem { // Espaçamento
                        Spacer(modifier = Modifier.height(300.dp))
                    }
                }
                item {
                    PaddedItem { // Botão
                        ElementoBotao(value = stringResource(id = R.string.login), onClick = {
                            // Handle button click
                        })
                    }
                }
                item {
                    PaddedItem { // Espaçamento
                        Spacer(modifier = Modifier.height(20.dp))
                    }
                }
                item {
                    PaddedItem { // Divisor com texto
                        ElementoDivisorComTexto()
                    }
                }
                item {
                    PaddedItem { // Redirecionamento para cadastro
                        ElementoTextoCadastroClicavel(value = stringResource(id = R.string.irParaCadastro), onTextSelected = {
                            CriatilAppRouter.navigateTo(Screen.TelaCadastro)
                        })
                    }
                }
                item {
                    PaddedItem { // Espaçamento
                        Spacer(modifier = Modifier.height(100.dp))
                    }
                }

            }
            ElementoFooter(
                modifier = Modifier
                    .align(Alignment.BottomCenter)
                    .fillMaxWidth()
            )
        }
        SystemBackButtonHandler {
            CriatilAppRouter.navigateTo(Screen.TelaCadastro)
        }
    }
}
@Preview(showBackground = true, showSystemUi = true)
@Composable
fun TelaDeLoginPreview() {
    TelaDeLogin()
}