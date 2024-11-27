package com.example.appcriatil.screens

import android.widget.Toast
import androidx.compose.foundation.ExperimentalFoundationApi
import androidx.compose.foundation.background
import androidx.compose.foundation.layout.Box
import androidx.compose.foundation.layout.PaddingValues
import androidx.compose.foundation.layout.Spacer
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.foundation.layout.fillMaxWidth
import androidx.compose.foundation.layout.height
import androidx.compose.foundation.layout.heightIn
import androidx.compose.foundation.lazy.LazyColumn
import androidx.compose.material3.ExperimentalMaterial3Api
import androidx.compose.material3.Surface
import androidx.compose.material3.Text
import androidx.compose.runtime.Composable
import androidx.compose.runtime.LaunchedEffect
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
import androidx.compose.ui.text.font.FontStyle
import androidx.compose.ui.text.font.FontWeight
import androidx.compose.ui.text.style.TextAlign
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
import com.example.appcriatil.components.ElementoHomeHeader
import com.example.appcriatil.components.ElementoSenhaTextField
import com.example.appcriatil.components.ElementoTextField
import com.example.appcriatil.components.ElementoTextoCadastroClicavel
import com.example.appcriatil.components.ElementoTextoDisplay
import com.example.appcriatil.components.ElementoTextoTitulo
import com.example.appcriatil.components.PaddedItem
import com.example.appcriatil.navigation.CriatilAppRouter
import com.example.appcriatil.navigation.Screen
import com.example.appcriatil.navigation.SystemBackButtonHandler
import com.example.appcriatil.ui.theme.TextColor
import com.example.appcriatil.viewModel.CriatilViewModel
import com.example.appcriatil.viewModel.Repository
import kotlinx.coroutines.CoroutineScope
import kotlinx.coroutines.Dispatchers.Main
import kotlinx.coroutines.launch

@OptIn(ExperimentalMaterial3Api::class, ExperimentalFoundationApi::class)
@Composable
fun TelaPerfil(viewModel: CriatilViewModel, mainActivity: MainActivity) {
    var usuarioList by remember{
        mutableStateOf(listOf<Usuario>())
    }
    var usuario by remember{
        mutableStateOf(Usuario(
            nomeValue = "",
            emailValue = "",
            senhaValue = "",
            cepValue = "",
            telValue = "",
            logValue = false
        ))
    }
    val shouldShowDialog = remember { mutableStateOf(false) } // 1
    LaunchedEffect(
        key1 = true
    ) {
        CoroutineScope(Main).launch {
            usuarioList = viewModel.verificarLogin()
            usuario = usuarioList[0]
        }
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
                    PaddedItem {
                        ElementoTextoTitulo(value = stringResource(R.string.bem_vindo_de_volta))
                    }
                }
                item {
                    PaddedItem { // Espaçamento
                        Spacer(modifier = Modifier.height(20.dp))
                    }
                }
                item {
                    PaddedItem { // Espaçamento
                        Spacer(modifier = Modifier.height(20.dp))
                    }
                }
                item {
                    PaddedItem { // Display de dados
                        Text(
                            text = "Nome:   ".plus(usuario.nomeValue),
                            modifier = Modifier
                                .fillMaxWidth()
                                .heightIn(min = 40.dp),
                            style = TextStyle(
                                fontSize = 24.sp,
                                fontWeight = FontWeight.Normal,
                                fontStyle = FontStyle.Normal
                            )
                            , color = TextColor,
                            textAlign = TextAlign.Center
                        )
                    }
                }
                item {
                    PaddedItem { // Espaçamento
                        Spacer(modifier = Modifier.height(5.dp))
                    }
                }
                item {
                    PaddedItem { // Display de dados
                        Text(
                            text = "Email:   ".plus(usuario.emailValue),
                            modifier = Modifier
                                .fillMaxWidth()
                                .heightIn(min = 40.dp),
                            style = TextStyle(
                                fontSize = 24.sp,
                                fontWeight = FontWeight.Normal,
                                fontStyle = FontStyle.Normal
                            )
                            , color = TextColor,
                            textAlign = TextAlign.Center
                        )
                    }
                }
                item {
                    PaddedItem { // Espaçamento
                        Spacer(modifier = Modifier.height(5.dp))
                    }
                }
                item {
                    PaddedItem { // Display de dados
                        Text(
                            text = "Telefone:   ".plus(usuario.telValue),
                            modifier = Modifier
                                .fillMaxWidth()
                                .heightIn(min = 40.dp),
                            style = TextStyle(
                                fontSize = 24.sp,
                                fontWeight = FontWeight.Normal,
                                fontStyle = FontStyle.Normal
                            )
                            , color = TextColor,
                            textAlign = TextAlign.Center
                        )
                    }
                }
                item {
                    PaddedItem { // Espaçamento
                        Spacer(modifier = Modifier.height(5.dp))
                    }
                }
                item {
                    PaddedItem { // Display de dados
                        Text(
                            text = "CEP:   ".plus(usuario.cepValue),
                            modifier = Modifier
                                .fillMaxWidth()
                                .heightIn(min = 40.dp),
                            style = TextStyle(
                                fontSize = 24.sp,
                                fontWeight = FontWeight.Normal,
                                fontStyle = FontStyle.Normal
                            )
                            , color = TextColor,
                            textAlign = TextAlign.Center
                        )
                    }
                }
                item {
                    PaddedItem { // Espaçamento
                        Spacer(modifier = Modifier.height(5.dp))
                    }
                }
                item {
                    ElementoBotao(
                        onClick = {
                            usuario.logValue = false
                            viewModel.upsertUsuario(usuario)
                            Toast.makeText(
                                mainActivity,
                                "Saindo de " + usuario.nomeValue + "...",
                                Toast.LENGTH_SHORT
                            ).show()
                        },
                        value = TODO()
                    )
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
fun TelapPerfilPreview() {
    //TelaPerfil()
}