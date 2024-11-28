package com.example.appcriatil.screens

import androidx.compose.foundation.ExperimentalFoundationApi
import androidx.compose.foundation.background
import androidx.compose.foundation.layout.Arrangement
import androidx.compose.foundation.layout.Box
import androidx.compose.foundation.layout.PaddingValues
import androidx.compose.foundation.layout.Row
import androidx.compose.foundation.layout.Spacer
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.foundation.layout.fillMaxWidth
import androidx.compose.foundation.layout.height
import androidx.compose.foundation.layout.heightIn
import androidx.compose.foundation.layout.padding
import androidx.compose.foundation.lazy.LazyColumn
import androidx.compose.material3.Surface
import androidx.compose.runtime.Composable
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.res.painterResource
import androidx.compose.ui.res.stringResource
import androidx.compose.ui.tooling.preview.Preview
import androidx.compose.ui.unit.dp
import androidx.navigation.NavController
import com.example.appcriatil.MainActivity
import com.example.appcriatil.R
import com.example.appcriatil.R.string.peluciamiku
import com.example.appcriatil.components.ElementoCardProduto
import com.example.appcriatil.components.ElementoFooter
import com.example.appcriatil.components.ElementoHeaderNav
import com.example.appcriatil.components.ElementoHomeHeader
import com.example.appcriatil.components.ElementoIconCarousel
import com.example.appcriatil.components.ElementoIconeFooter
import com.example.appcriatil.components.ElementoImageCarousel
import com.example.appcriatil.components.ElementoTextoTitulo
import com.example.appcriatil.components.IconData
import com.example.appcriatil.components.PaddedItem
import com.example.appcriatil.navigation.CriatilAppRouter
import com.example.appcriatil.navigation.SystemBackButtonHandler
import com.example.appcriatil.viewModel.CriatilViewModel

@OptIn(ExperimentalFoundationApi::class)
@Composable
fun Home(navController: NavController, modifier: Modifier = Modifier){
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
                    ElementoHomeHeader()
                }
                item {
                    Spacer(modifier = Modifier.height(5.dp))
                }
                item {
                    PaddedItem { // Carrossel
                        ElementoImageCarousel(images = listOf(R.drawable.image1, R.drawable.image2, R.drawable.image3))
                    }
                }
                item {
                    PaddedItem { // Icones
                        val icones = listOf(
                            IconData(R.drawable.iconebandainamco, "Bandai Namco"),
                            IconData(R.drawable.iconecopag, "Copag"),
                            IconData(R.drawable.iconeestrela, "Icon 3"),
                            IconData(R.drawable.iconemattel, "Icon 4"),
                            IconData(R.drawable.iconelego, "Icon 5"),
                            IconData(R.drawable.iconehasbro, "Icon 6"),
                            // Adicione mais colocando a imagem e o texto
                        )
                        ElementoIconCarousel(iconDataList = icones)
                    }
                }
                item {
                    PaddedItem { // Espaçamento
                        Spacer(modifier = Modifier.height(20.dp))
                    }
                }
                item {
                    PaddedItem { // Texto
                        ElementoTextoTitulo("Novidades")
                    }
                }
                item {
                    PaddedItem {
                        Row(
                            modifier = Modifier.fillMaxWidth(),
                            horizontalArrangement = Arrangement.spacedBy(8.dp)
                        ) {
                            ElementoCardProduto(
                                texto = stringResource(R.string.peluciaralsei),
                                preco = stringResource(R.string.precopeluciaralsei),
                                painterResource = painterResource(id = R.drawable.ralseideltarune),
                                onClick = { /* TODO */ }
                            )
                            ElementoCardProduto(
                                texto = stringResource(R.string.nerf),
                                preco = stringResource(R.string.preconerf),
                                painterResource = painterResource(id = R.drawable.nerf),
                                onClick = { /* TODO */ }
                            )
                        }
                    }
                }
                item {
                    PaddedItem {
                        Row(
                            modifier = Modifier.fillMaxWidth(),
                            horizontalArrangement = Arrangement.spacedBy(8.dp)
                        ) {
                            ElementoCardProduto(
                                texto = stringResource(peluciamiku),
                                preco = stringResource(R.string.precomiku),
                                painterResource = painterResource(id = R.drawable.miku),
                                onClick = { /* TODO */ }
                            )
                            ElementoCardProduto(
                                texto = stringResource(R.string.funko),
                                preco = stringResource(R.string.precofunko),
                                painterResource = painterResource(id = R.drawable.funko),
                                onClick = { /* TODO */ }
                            )
                        }
                    }
                }
                item {
                    PaddedItem { // Espaçamento
                        Spacer(modifier = Modifier.height(100.dp))
                    }
                }
                item {
                    Row(
                        modifier = modifier
                            .fillMaxWidth()
                            .heightIn(min = 48.dp)
                            .background(Color(0xFF0476D9))
                            .padding(16.dp),
                        horizontalArrangement = Arrangement.SpaceAround,
                        verticalAlignment = Alignment.CenterVertically
                    ) {
                        ElementoIconeFooter(
                            text = "Home",
                            painterResource = painterResource(id = R.drawable.homeicon),
                            onClick = { navController.navigate(CriatilAppRouter.home) }
                        )
                        ElementoIconeFooter(
                            text = "Carrinho",
                            painterResource = painterResource(id = R.drawable.carrinho),
                            onClick = { /* TODO */ }
                        )
                        ElementoIconeFooter(
                            text = "Perfil",
                            painterResource = painterResource(id = R.drawable.icon_profile),
                            onClick = { navController.navigate(CriatilAppRouter.login) }
                        )
                    }
                }
            }
        }
        SystemBackButtonHandler {
            navController.navigate(CriatilAppRouter.cadastro)
        }
    }
}
@Preview
@Composable
fun DefaultPreviewOfHome(){
    //Home()
}