using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleApplication1
{
    class Chien : Canin
    {
        public Chien(){} // constructeur par défaut
        public Chien(int poids, string coul) // constructeur paramètré
        {
            this.Poids = poids;
            this.Couleur = coul;
        }
        public override void crier()
        {
            Console.WriteLine("j'aboie");
        }
        public override void deplacement()
        {
            Console.WriteLine("je me déplace seul");
        }
    }
}
