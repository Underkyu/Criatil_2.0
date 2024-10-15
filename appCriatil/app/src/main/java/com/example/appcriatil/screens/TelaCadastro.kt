package com.example.appcriatil.screens

import androidx.compose.foundation.background
import androidx.compose.foundation.layout.Column
import androidx.compose.foundation.layout.Spacer
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.foundation.layout.height
import androidx.compose.foundation.layout.padding
import androidx.compose.material3.ExperimentalMaterial3Api
import androidx.compose.material3.Surface
import androidx.compose.runtime.Composable
import androidx.compose.ui.Modifier
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.res.painterResource
import androidx.compose.ui.res.stringResource
import androidx.compose.ui.tooling.preview.Preview
import androidx.compose.ui.unit.dp
import com.example.appcriatil.R
import com.example.appcriatil.components.*
import com.example.appcriatil.navigation.CriatilAppRouter
import com.example.appcriatil.navigation.Screen

@OptIn(ExperimentalMaterial3Api::class)
@Composable
fun TelaCadastro() {
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

            ElementoTextoTitulo(value = stringResource(R.string.crieConta))
            //Espaçamento
            Spacer(modifier = Modifier.height(20.dp))
            //Campos
            ElementoTextField(labelValue = stringResource(id = R.string.primeiroNome), painterResource(id = R.drawable.icon_profile))

            ElementoTextField(labelValue = stringResource(id = R.string.ultimoNome), painterResource = painterResource(id = R.drawable.icon_profile))

            ElementoTextField(labelValue = stringResource(id = R.string.email), painterResource = painterResource(id = R.drawable.email))

            ElementoSenhaTextField(labelValue = stringResource(id = R.string.senha), painterResource = painterResource(id = R.drawable.lock))
            //Termos de uso
            ElementoCheckbox(value = stringResource(id = R.string.termos), onTextSelected = {
                CriatilAppRouter.navigateTo(Screen.TelaDeTermosECondicoes)
            })
            //Espaçamento
            Spacer(modifier = Modifier.height(210.dp))
            //Botão
            ElementoBotao(value = stringResource(id = R.string.cadastrar), onClick = {

            })
            //Espaçamento
            Spacer(modifier = Modifier.height(20.dp))
            //Divisor com texto
            ElementoDivisorComTexto()
            //Redirecionamento para login
            ElementoTextoLoginClicavel(value = stringResource(id = R.string.irParaLogin), onTextSelected = {
                CriatilAppRouter.navigateTo(Screen.TelaDeLogin)
            })
        }

    }
}

@Preview
@Composable
fun DefaultPreviewOfTelaCadastro(){
    TelaCadastro()
}