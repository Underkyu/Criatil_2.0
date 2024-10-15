package com.example.appcriatil.screens

import androidx.compose.foundation.background
import androidx.compose.foundation.layout.Column
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.foundation.layout.padding
import androidx.compose.material3.Surface
import androidx.compose.runtime.Composable
import androidx.compose.ui.Modifier
import androidx.compose.ui.tooling.preview.Preview
import androidx.compose.ui.graphics.*
import androidx.compose.ui.res.stringResource
import androidx.compose.ui.unit.dp
import com.example.appcriatil.components.ElementoTextoTitulo
import com.example.appcriatil.R
import com.example.appcriatil.components.*
import com.example.appcriatil.navigation.CriatilAppRouter
import com.example.appcriatil.navigation.Screen
import com.example.appcriatil.navigation.SystemBackButtonHandler

@Composable
fun TelaDeTermosECondicoes() {
    Surface(modifier = Modifier
        .fillMaxSize()
        .background(color = Color.White)
        .padding(16.dp)){

        Column {
            ElementoTextoTitulo(value = stringResource(R.string.TituloTermosECondicoes))

            ElementoTextoBasico(value = stringResource(R.string.TermosECondicoes))
        }
        SystemBackButtonHandler {
            CriatilAppRouter.navigateTo(Screen.TelaCadastro)
        }
    }
}

@Preview
@Composable
fun DefaultPreviewOfTelaDeTermosECondicoes(){
    TelaDeTermosECondicoes()
}