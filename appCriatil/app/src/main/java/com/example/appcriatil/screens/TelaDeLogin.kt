package com.example.appcriatil.screens

import androidx.compose.foundation.background
import androidx.compose.foundation.layout.Column
import androidx.compose.foundation.layout.Spacer
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.foundation.layout.height
import androidx.compose.foundation.layout.padding
import androidx.compose.material3.Surface
import androidx.compose.runtime.Composable
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
import com.example.appcriatil.components.ElementoSenhaTextField
import com.example.appcriatil.components.ElementoTextField
import com.example.appcriatil.components.ElementoTextoBasico
import com.example.appcriatil.components.ElementoTextoCadastroClicavel
import com.example.appcriatil.components.ElementoTextoTitulo
import com.example.appcriatil.navigation.CriatilAppRouter
import com.example.appcriatil.navigation.Screen
import com.example.appcriatil.navigation.SystemBackButtonHandler

@Composable
fun TelaDeLogin(){
    Surface(
        color = Color.White,
        modifier = Modifier
            .fillMaxSize()
            .background(Color.White)
            .padding(24.dp)
    ){
        Column (modifier = Modifier.fillMaxSize()) {
            //Título e subtítulo
            ElementoTextoBasico(value = stringResource(R.string.saudacao))

            ElementoTextoTitulo(value = stringResource(R.string.bem_vindo_de_volta))
            //Espaçamento
            Spacer(modifier = Modifier.height(20.dp))
            //Campos
            ElementoTextField(labelValue = stringResource(id = R.string.email), painterResource = painterResource(id = R.drawable.email))

            ElementoSenhaTextField(labelValue = stringResource(id = R.string.senha), painterResource = painterResource(id = R.drawable.lock))
            //Termos de uso
            ElementoCheckbox(value = stringResource(id = R.string.termos), onTextSelected = {
                CriatilAppRouter.navigateTo(Screen.TelaDeTermosECondicoes)
            })
            //Espaçamento
            Spacer(modifier = Modifier.height(340.dp))
            //Botão
            ElementoBotao(value = stringResource(id = R.string.login), onClick = {

            })
            //Espaçamento
            Spacer(modifier = Modifier.height(20.dp))
            //Divisor com texto
            ElementoDivisorComTexto()
            //Redirecionamento para login
            ElementoTextoCadastroClicavel(value = stringResource(id = R.string.irParaCadastro), onTextSelected = {
                CriatilAppRouter.navigateTo(Screen.TelaCadastro)
            })
        }
        SystemBackButtonHandler {
            CriatilAppRouter.navigateTo(Screen.TelaCadastro)
        }
    }
}
@Preview(showBackground = true)
@Composable
fun TelaDeLoginPreview() {
    TelaDeLogin()
}